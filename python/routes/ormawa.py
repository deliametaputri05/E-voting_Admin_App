from fastapi import APIRouter,Response, status
from config.db import conn
from models.table import ormawa


orm_router= APIRouter(
    prefix="/ormawa",
    tags=["ormawa"],
    responses={404: {"description": "Not found"}},
)


@orm_router.get("/")
async def read_data(response: Response):
    data = conn.execute(ormawa.select()).fetchall()
    if data is None:
        response.status_code = status.HTTP_404_NOT_FOUND
        return {"message": "data tidak ditemukan", "status": response.status_code}
    response = {"message": "Sukses mengambil data", "data": data }
    return response
