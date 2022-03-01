<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class CalonWakil extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "calon_wakil";

    protected $fillable = [
        'id_jurusan', 'id_ormawa', 'nim', 'nama', 'angkatan', 'kelas', 'foto',
        'alamat', 'waktu_memilih', 'sudah_vote', 'moto'

    ];

    public function ormawa()
    {
        return $this->hasOne(Ormawa::class, 'id', 'id_ormawa');
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'id', 'id_jurusan');
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)
            ->getPreciseTimestamp(3);
    }

    public function getUpdatedAtAttribute($updated_at)
    {
        return Carbon::parse($updated_at)
            ->getPreciseTimestamp(3);
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['foto'] = $this->foto;
        return $toArray;
    }

    public function getFotoAttribute()
    {
        return config('app.url') . Storage::url($this->attributes['foto']);
    }
}
