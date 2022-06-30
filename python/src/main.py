from fastapi import FastAPI
import uvicorn
from routes.users import user_router
from routes.jurusan import jsn_router
from routes.ormawa import orm_router
from routes.pemira import pemira_router
from routes.kandidat import knd_router
from routes.clnKetua import clnKetua_router
from routes.clnWakil import clnWakil_router
from routes.mahasiswa import mhs_router


app = FastAPI()

app.include_router(user_router)
app.include_router(jsn_router)
app.include_router(orm_router)
app.include_router(pemira_router)
app.include_router(knd_router)
app.include_router(clnKetua_router)
app.include_router(clnWakil_router)
app.include_router(mhs_router)


@app.get("/")
async def root():
    return {"message": "Hello Bigger Applications!"}

if __name__ == "__main__":
    uvicorn.run(app, host="192.168.43.86", port=5000)