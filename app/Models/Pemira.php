<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Pemira extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "pemira";

    protected $fillable = [
        'id_ormawa', 'nama', 'foto', 'deskripsi', 'tanggal', 'waktu_mulai', 'waktu_selesai'

    ];

    public function ormawa()
    {
        return $this->hasOne(Ormawa::class, 'id', 'id_ormawa');
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
