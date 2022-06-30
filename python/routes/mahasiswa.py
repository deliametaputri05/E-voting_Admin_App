from fastapi import APIRouter, File, Form, UploadFile, BackgroundTasks
from fastapi.responses import JSONResponse
from fastapi.encoders import jsonable_encoder
from config.db import conn
from models.table import mahasiswa
from PIL import Image
import cv2

import face_recognition


path = '../public/storage/static/face/unknown/'
path_face = '../public/storage/static/face/'

mhs_router=APIRouter(
    prefix="/mahasiswa",
    tags=["mahasiswa"],
    responses={404: {"description": "Not found"}},
)


@mhs_router.get("/")
async def read_data():
    return conn.execute(mahasiswa.select()).fetchall()

def resize_image(filename: str):
    sizes = [{
        "width": 1280,
        "height": 720
    }, {
        "width": 640,
        "height": 480
    }]

    for size in sizes:
        size_defined = size['width'], size['height']

        image = Image.open(path + filename, mode="r")
        image.thumbnail(size_defined)
        image.save(path + str(size['height']) + "_" + filename)
    print("success")


@mhs_router.post("/upload/file")
async def upload_file(background_tasks: BackgroundTasks, file: UploadFile = File(...)):

    # SAVE FILE ORIGINAL
    with open(path + file.filename, "wb") as myfile:
        content = await file.read()
        myfile.write(content)
        myfile.close()

    # RESIZE IMAGES
    background_tasks.add_task(resize_image, filename=file.filename)
    return JSONResponse(content={"message": "success"})

@mhs_router.post("/facerecognition")
async def faceRecognition(face_image: UploadFile = File(...) ,nim: int = Form(...)):

        
        # Load the uploaded image file
        cursor = conn.execute(mahasiswa.select().where(mahasiswa.c.nim == nim))
        chekd = cursor.fetchone()

        if chekd:
            id_ = chekd["nim"]
        else:
            err = {'status': 500, 'msg': "User tidak Ditemukan"}
            return err

        if face_image.filename == "":
            err = {'status': 500, 'msg': "Tidak ada file yang diupload"}
            return err

        if face_image:
            
            with open(path + str(id_)+"_original"+".jpg", "wb") as f:
                f.write(face_image.file.read())

            image = cv2.imread(path + str(id_)+"_original"+".jpg")
            print('Original Dimensions : ',image.shape)

            scale_percent = 60 # percent of original size
            width = int(image.shape[1] * scale_percent / 100)
            height = int(image.shape[0] * scale_percent / 100)
            dim = (width, height)
            resized = cv2.resize(image, dim, interpolation = cv2.INTER_AREA)
            print('Resized Dimensions : ',resized.shape)
            
            cv2.imwrite(path + str(id_) + ".jpg",resized)

        
        try:
            image_of_bill = face_recognition.load_image_file(path_face + str(id_) + ".jpg")
        except:
            err = {'status': '500', 'msg': 'User belum setting face untuk login'}
            return err
        # print(image_of_bill)
        
        bill_face_encoding = face_recognition.face_encodings(image_of_bill)[0]

        unknown_image = face_recognition.load_image_file(path+str(id_)+'.jpg')
        try:
            unknown_face_encoding = face_recognition.face_encodings(
                unknown_image, num_jitters=1, model="small")[0]
        except:
            err = {'status': '500', 'msg': 'Foto Tidak Jelas'}
            return err
        
        results = face_recognition.compare_faces(
            [bill_face_encoding], unknown_face_encoding, tolerance=0.5)
        
        if results[0]:
            cursor = conn.execute(mahasiswa.select().where(mahasiswa.c.nim == nim))
            data = cursor.fetchone()

            
            data = {
                "id": data['id'],
                "id_jurusan": data['id_jurusan'],
                "foto": "http://192.168.43.86:8000/storage"+data['foto'][6:],
                "nim": data['nim'],
                "angkatan" : data['angkatan'],
                "nama": data['nama'],
                "kelas": data['kelas'],
                "sudah_vote": data['sudah_vote'],
            }
           
            msg = {"message": "Sukses mengambil data", "data": data, "status": 200}
            return jsonable_encoder(msg)

        else:
            err = {'status': 500, 'msg': "Wajah Tidak Cocok"}
            return err






