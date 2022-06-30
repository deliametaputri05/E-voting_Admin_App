<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Mahasiswa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "mahasiswa";

    protected $fillable = [
        'id_jurusan', 'nim', 'nama', 'angkatan', 'kelas', 'foto',
        'sudah_vote'

    ];

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
