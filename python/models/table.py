from sqlalchemy import Table,Column
from sqlalchemy.sql.sqltypes import Integer,String, DateTime
from config.db import meta

users = Table(
    'users', meta,
    Column('id',Integer, primary_key=True),
    Column('name',String(255)),
    Column('email',String(255)),
    Column('password',String(255)),
)

jurusan = Table(
    'jurusan', meta,
    Column('id',Integer, primary_key=True),
    Column('nama',String(255)),
    Column('jenjang', String(2)),
)

ormawa = Table(
    'ormawa', meta,
    Column('id',Integer),
    Column('nama',String(255)),
    Column('logo',String(255)),
)

pemira = Table(
    'pemira', meta,
    Column('id',Integer),
    Column('id_ormawa',Integer),
    Column('nama',String(255)),
    Column('foto',String(255)),
    Column('deskripsi',String(255)),
    Column('waktu_mulai',DateTime),
    Column('waktu_selesai',DateTime),
)

kandidat = Table(
    'kandidat', meta,
    Column('id',Integer),
    Column('id_clnKetua',Integer),
    Column('id_clnWakil',Integer),
    Column('id_pemira',Integer),
    Column('id_ormawa',Integer),
    Column('no_urut',Integer),
    Column('foto',String(255)),
    Column('visi',String(255)),
    Column('misi',String(255)),
    Column('hasil_suara',Integer)
)

calon_ketua = Table (
    'calon_ketua', meta,
    Column('id',Integer),
    Column('id_jurusan',Integer),
    Column('id_ormawa',Integer),
    Column('nim',Integer),
    Column('nama',String(255)),
    Column('angkatan',Integer),
    Column('foto',String(255)),
    Column('alamat',String(255)),
    Column('moto',String(255)),
)

calon_wakil = Table (
    'calon_wakil', meta,
    Column('id',Integer),
    Column('id_jurusan',Integer),
    Column('id_ormawa',Integer),
    Column('nim',Integer),
    Column('nama',String(255)),
    Column('angkatan',Integer),
    Column('foto',String(255)),
    Column('alamat',String(255)),
    Column('moto',String(255)),
)

mahasiswa = Table(
    'mahasiswa', meta,
    Column('id',Integer),
    Column('id_jurusan',Integer),
    Column('nim',Integer),
    Column('nama',String(255)),
    Column('angkatan',Integer),
    Column('foto',String(255)),
    Column('kelas',String(255)),
    Column('sudah_vote',Integer),


)