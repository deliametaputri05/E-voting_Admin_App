from fastapi import APIRouter, Response, status
from config.db import conn
from models.table import users
from schemas.users import User

user_router = APIRouter(
    prefix="/users",
    tags=["users"],
    responses={404: {"description": "Not found"}},
)


@user_router.get("/")
async def read_data(response: Response):
    data  = conn.execute(users.select()).fetchall()
    if data is None:
        response.status_code = status.HTTP_404_NOT_FOUND
        return {"message": "data tidak ditemukan", "status": response.status_code}
    response = {"message": "Sukses mengambil data", "data": data }
    return response

@user_router.get("/{id}")
async def read_data(id: int):
    return conn.execute(users.select().where(users.c.id == id)).fetchall()

@user_router.post("/")
async def write_data(user: User):
    conn.execute(users.insert().values(
        name = user.name,
        email = user.email,
        password = user.password
    ))
    return conn.execute(users.select()).fetchall()

@user_router.put("/{id}")
async def update_data(id: int, user: User):
    conn.execute(users.update().where(users.c.id == id).values(
        name = user.name,
        email = user.email,
        password = user.password
    ))
    return conn.execute(users.select()).fetchall()

@user_router.delete("/{id}")
async def delete_data(id: int):
    conn.execute(users.delete().where(users.c.id == id))
    return conn.execute(users.select()).fetchall()

