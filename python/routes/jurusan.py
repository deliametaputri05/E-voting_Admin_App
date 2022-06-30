from fastapi import APIRouter
from config.db import conn
from models.table import jurusan


jsn_router = APIRouter(
    prefix="/jurusan",
    tags=["jurusan"],
    responses={404: {"description": "Not found"}},
)


@jsn_router.get("/")
async def read_data():
    return conn.execute(jurusan.select()).fetchall()
