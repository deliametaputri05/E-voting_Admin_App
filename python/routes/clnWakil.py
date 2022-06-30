from fastapi import APIRouter
from config.db import conn
from models.table import calon_wakil


clnWakil_router = APIRouter(
    prefix="/calonWakil",
    tags=["calonWakil"],
    responses={404: {"description": "Not found"}},
)


@clnWakil_router.get("/")
async def read_data():
    return conn.execute(calon_wakil.select()).fetchall()
