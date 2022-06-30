from fastapi import APIRouter
from config.db import conn
from models.table import kandidat


knd_router = APIRouter(
    prefix="/kandidat",
    tags=["kandidat"],
    responses={404: {"description": "Not found"}},
)


@knd_router.get("/")
async def read_data():
    return conn.execute(kandidat.select()).fetchall()

@knd_router.get("/{id_pemira}")
async def read_data(id_pemira: int):
    return conn.execute(kandidat.select().where(kandidat.c.id_pemira == id_pemira)).fetchall()
