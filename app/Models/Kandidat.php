<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Kandidat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "kandidat";

    protected $fillable = [
        'id_clnKetua', 'id_clnWakil', 'id_pemira', 'id_ormawa', 'no_urut', 'foto', 'visi', 'misi'


    ];

    public function ormawa()
    {
        return $this->hasOne(Ormawa::class, 'id', 'id_ormawa');
    }

    public function pemira()
    {
        return $this->hasOne(Pemira::class, 'id', 'id_pemira');
    }

    public function calonKetua()
    {
        return $this->hasOne(CalonKetua::class, 'id', 'id_clnKetua');
    }

    public function calonWakil()
    {
        return $this->hasOne(CalonWakil::class, 'id', 'id_clnWakil');
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
