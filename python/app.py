import os
import re
import io
import zlib

from werkzeug.utils import secure_filename
from flask import Response
from flask import Flask, flash, jsonify, redirect, render_template, request, session, url_for
from flask_session import Session
from tempfile import mkdtemp
from werkzeug.exceptions import default_exceptions, HTTPException, InternalServerError
from werkzeug.security import check_password_hash, generate_password_hash
from datetime import datetime
import face_recognition
from PIL import Image
from base64 import b64encode, b64decode
from flask_mysqldb import MySQL
import MySQLdb.cursors
import hashlib

from helpers import apology, login_required
# Configure application
app = Flask(__name__)
# configure flask-socketio

# Ensure templates are auto-reloaded
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Ensure responses aren't cached


@app.after_request
def after_request(response):
    response.headers["Cache-Control"] = "no-cache, no-store, must-revalidate"
    response.headers["Expires"] = 0
    response.headers["Pragma"] = "no-cache"
    return response


# Custom filter


# Configure session to use filesystem (instead of signed cookies)
app.config["SESSION_FILE_DIR"] = mkdtemp()
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
Session(app)
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'evoting'

# Configure MySQL
mysql = MySQL(app)


@app.route("/")
@login_required
def home():
    return redirect("/home")


@app.route("/home")
@login_required
def index():
    return render_template("index.html")


@app.route("/editkduser")
@login_required
def editkduser():
    return render_template('editkduser.html')


@app.route("/changepwd")
@login_required
def changepwd():
    return render_template('changepassword.html')


@app.route("/login", methods=["GET", "POST"])
def login():
    """Log user in"""

    # Forget any user_id
    session.clear()

    # User reached route via POST (as by submitting a form via POST)
    if request.method == "POST":

        # Assign inputs to variables
        input_username = request.form.get("username")
        input_password = request.form.get("password")

        # Ensure username was submitted
        if not input_username:
            return render_template("login.html", messager=1)

        # Ensure password was submitted
        elif not input_password:
            return render_template("login.html", messager=2)

        # Query database for username
        input_password = input_password.encode()
        input_password = hashlib.sha256(input_password).hexdigest()
        input_password = input_password[0:13]
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM user WHERE username = % s AND password = % s', (input_username, input_password, ))
        chekd = cursor.fetchone()
        if chekd:
            session["user_id"] = chekd["id"]
            session["username"] = chekd["username"]
            session["name"] = chekd["name"]
            # Redirect user to home page
            return redirect("/")
        else:
            return render_template("login.html", messager=3)
        # Remember which user has logged in
    # User reached route via GET (as by clicking a link or via redirect)
    else:
        return render_template("login.html")


@app.route("/logout")
def logout():
    """Log user out"""

    # Forget any user_id
    session.clear()

    # Redirect user to login form
    return redirect("/")


@app.route("/updatekduser", methods=["GET", "POST"])
def updatekduser():
    if request.method == "POST":
        new_kduser = request.form.get("kduser")

        if not new_kduser:
            return render_template('editkduser.html', messager=1)

        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM user WHERE kd_user = % s', [new_kduser])
        chekddd = cursor.fetchone()
        if chekddd:
            return render_template('editkduser.html', messager=2)
        cursor.execute('UPDATE user SET kd_user = %s WHERE id = %s',
                       (new_kduser, session['user_id']))
        mysql.connection.commit()
        return redirect('/home')


@app.route("/updatepwd", methods=["GET", "POST"])
def updatepwd():
    if request.method == "POST":
        old_pwd = request.form.get("oldpassword")
        new_pwd = request.form.get("newpassword")
        cnf_new_pwd = request.form.get("confirmnewpassword")

        if not old_pwd:
            return render_template('changepassword.html', messager=2)
        elif not new_pwd:
            return render_template('changepassword.html', messager=3)
        elif not cnf_new_pwd:
            return render_template('changepassword.html', messager=4)
        elif not new_pwd == cnf_new_pwd:
            return render_template('changepassword.html', messager=5)

        old_pwd = old_pwd.encode()
        old_pwd = hashlib.sha256(old_pwd).hexdigest()
        old_pwd = old_pwd[0:13]
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute('SELECT * FROM user WHERE username = % s AND password = % s',
                       (session['username'], old_pwd))
        chekddd = cursor.fetchone()
        if chekddd:
            new_pwd = new_pwd.encode()
            new_pwd = hashlib.sha256(new_pwd).hexdigest()
            new_pwd = new_pwd[0:13]
            cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            cursor.execute(
                'UPDATE user SET password = %s WHERE id = %s', (new_pwd, session['user_id']))
            mysql.connection.commit()
            return redirect('/home')
        else:
            return render_template('changepassword.html', messager=1)


@app.route("/register", methods=["GET", "POST"])
def register():
    """Register user"""

    # User reached route via POST (as by submitting a form via POST)
    if request.method == "POST":

        # Assign inputs to variables
        input_username = request.form.get("username")
        input_password = request.form.get("password")
        input_confirmation = request.form.get("confirmation")
        input_name = request.form.get("name")
        input_kduser = request.form.get("kduser")

        # Name Validation
        if not input_name:
            return render_template("register.html", messager=8)

        # Kode User Validation
        elif not input_kduser:
            return render_template("register.html", messager=6)

        # Ensure username was submitted
        elif not input_username:
            return render_template("register.html", messager=1)

        # Ensure password was submitted
        elif not input_password:
            return render_template("register.html", messager=2)

        # Ensure passwsord confirmation was submitted
        elif not input_confirmation:
            return render_template("register.html", messager=4)

        elif not input_password == input_confirmation:
            return render_template("register.html", messager=3)

        # Query database for username
        input_password = input_password.encode()
        input_password = hashlib.sha256(input_password).hexdigest()
        input_password = input_password[0:13]
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM user WHERE username = % s', [input_username])
        chekddd = cursor.fetchone()
        cursor.execute(
            'SELECT * FROM user WHERE kd_user = % s', [input_kduser])
        chekddduser = cursor.fetchone()

        if chekddduser:
            return render_template("register.html", messager=7)
        # Ensure username is not already taken
        if chekddd:
            return render_template("register.html", messager=5)

        # Query database to insert new user
        else:
            cursor.execute('INSERT INTO user (username, password, name, kd_user) VALUES (% s, % s, % s, % s)',
                           (input_username, input_password, input_name, input_kduser))
            mysql.connection.commit()
            cursor.execute(
                'SELECT * FROM user WHERE username = % s AND password = % s', (input_username, input_password))
            chekds = cursor.fetchone()

            if chekds:
                # Keep newly registered user logged in
                session["user_id"] = chekds["id"]
                session["username"] = chekds["username"]
                session["name"] = chekds["name"]
                # Redirect user to home page
            # Flash info for the user
            flash(f"Registered as {input_username}")

            # Redirect user to homepage
            return redirect("/")

    # User reached route via GET (as by clicking a link or via redirect)
    else:
        return render_template("register.html")


@app.route("/facereg", methods=["GET", "POST"])
def facereg():
    session.clear()
    if request.method == "POST":
        encoded_image = (request.form.get("pic")+"==").encode('utf-8')
        nim = request.form.get("nim")
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM mahasiswa WHERE nim = % s', [nim])
        chekd = cursor.fetchone()
        if chekd:
            id_ = chekd['nim']
        else:
            return render_template("camera.html", message=1)

        compressed_data = zlib.compress(encoded_image, 9)

        uncompressed_data = zlib.decompress(compressed_data)

        decoded_data = b64decode(uncompressed_data)

        new_image_handle = open(
            '../public/storage/static/face/unknown/'+str(id_)+'.jpg', 'wb')

        new_image_handle.write(decoded_data)
        new_image_handle.close()
        try:
            image_of_bill = face_recognition.load_image_file(
                '../public/storage/static/face/'+str(id_)+'.jpg')
        except:
            return render_template("camera.html", message=5)

        bill_face_encoding = face_recognition.face_encodings(image_of_bill)[0]

        unknown_image = face_recognition.load_image_file(
            '../public/storage/static/face/unknown/'+str(id_)+'.jpg')
        try:
            unknown_face_encoding = face_recognition.face_encodings(
                unknown_image, num_jitters=10, model="large")[0]
        except:
            return render_template("camera.html", message=2)

        # compare faces
        results = face_recognition.compare_faces(
            [bill_face_encoding], unknown_face_encoding, tolerance=0.5)

        if results[0]:
            cursor.execute(
                'SELECT * FROM mahasiswa WHERE nim = % s', [nim])
            chekds = cursor.fetchone()
            session["user_id"] = chekds["id"]
            session["nim"] = chekds["nim"]
            session["nama"] = chekds["nama"]
            return redirect("/")
        else:
            return render_template("camera.html", message=3)

    else:
        return render_template("camera.html")


@app.route("/facerecognition", methods=["GET", "POST"])
def facerecognition():
    # session.clear()
    if request.method == "POST":
        encoded_image = request.files['camera']
        nim = request.form['nim']
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM mahasiswa WHERE nim = % s', [nim])
        chekd = cursor.fetchone()
        if chekd:
            id_ = chekd['nim']
        else:
            err = {'status': 500, 'msg': "User tidak Ditemukan"}
            return jsonify(err)

        compressed_data = zlib.compress(encoded_image, 9)

        uncompressed_data = zlib.decompress(compressed_data)

        decoded_data = b64decode(uncompressed_data)

        new_image_handle = open(
            '../public/storage/static/face/unknown/'+str(id_)+'.jpg', 'wb')

        new_image_handle.write(decoded_data)
        new_image_handle.close()
        try:
            image_of_bill = face_recognition.load_image_file(
                '../public/storage/static/face/'+str(id_)+'.jpg')
        except:
            err = {'status': '500', 'msg': 'User belum setting face untuk login'}
            return jsonify(err)

        bill_face_encoding = face_recognition.face_encodings(image_of_bill)[0]

        unknown_image = face_recognition.load_image_file(
            '../public/storage/static/face/unknown/'+str(id_)+'.jpg')
        try:
            unknown_face_encoding = face_recognition.face_encodings(
                unknown_image, num_jitters=2, model="large")[0]
        except:
            err = {'status': '500', 'msg': 'Foto Tidak Jelas'}
            return jsonify(err)

        # compare faces
        results = face_recognition.compare_faces(
            [bill_face_encoding], unknown_face_encoding, tolerance=0.5)

        if results[0]:
            cursor.execute(
                'SELECT * FROM mahasiswa WHERE nim = % s', [nim])
            chekds = cursor.fetchone()
            err = {'status': '200', 'msg': 'Sukses Get Data', 'nim': chekds['nim'], 'name': chekds['nama'], 'angkatan': chekds[
                'angkatan'], 'kelas': chekds['kelas'], 'foto': chekds['foto'], 'sudah_vote': chekds['sudah_vote']}
            return jsonify(err)
        else:
            err = {'status': '500', 'msg': 'Wajah Tidak Cocok'}
            return jsonify(err)

    else:
        return render_template("camera.html")


@app.route("/facesetup", methods=["GET", "POST"])
def facesetup():
    if request.method == "POST":

        encoded_image = (request.form.get("pic")+"==").encode('utf-8')

        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM user WHERE id = % s', [session['user_id']])
        chekd = cursor.fetchone()
        if chekd:
            id_ = chekd['id']
        # id_ = db.execute("SELECT id FROM users WHERE id = :user_id", user_id=session["user_id"])[0]["id"]
        compressed_data = zlib.compress(encoded_image, 9)

        uncompressed_data = zlib.decompress(compressed_data)
        decoded_data = b64decode(uncompressed_data)

        new_image_handle = open('./static/face/'+str(id_)+'.jpg', 'wb')

        new_image_handle.write(decoded_data)
        new_image_handle.close()
        image_of_bill = face_recognition.load_image_file(
            './static/face/'+str(id_)+'.jpg')
        try:
            bill_face_encoding = face_recognition.face_encodings(image_of_bill)[
                0]
        except:
            return render_template("face.html", message=1)
        return redirect("/home")

    else:
        return render_template("face.html")


def errorhandler(e):
    """Handle error"""
    if not isinstance(e, HTTPException):
        e = InternalServerError()
    return render_template("error.html", e=e)


# Listen for errors
for code in default_exceptions:
    app.errorhandler(code)(errorhandler)

if __name__ == '__main__':
    app.run()
