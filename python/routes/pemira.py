from fastapi import APIRouter,Response, status
from config.db import conn
from models.table import pemira


pemira_router= APIRouter(
    prefix="/pemira",
    tags=["pemira"],
    responses={404: {"description": "Not found"}},
)


@pemira_router.get("/")
async def read_data(response: Response):
    data = conn.execute(pemira.select()).fetchall()
    if data is None:
        response.status_code = status.HTTP_404_NOT_FOUND
        return {"message": "data tidak ditemukan", "status": response.status_code}
    response = {"message": "Sukses mengambil data", "data": data }
    return response
