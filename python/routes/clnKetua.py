from fastapi import APIRouter
from config.db import conn
from models.table import calon_ketua


clnKetua_router = APIRouter(
    prefix="/calonKetua",
    tags=["calonKetua"],
    responses={404: {"description": "Not found"}},
)


@clnKetua_router.get("/")
async def read_data():
    return conn.execute(calon_ketua.select()).fetchall()
