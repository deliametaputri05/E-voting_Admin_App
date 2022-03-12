<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Voting extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "calon_ketua";

    protected $fillable = [
        'id_pemira', 'id_kandidat', 'jumlah_suara', 'status',

    ];

    public function kandidat()
    {
        return $this->hasOne(Ormawa::class, 'id', 'id_kandidat');
    }

    public function pemira()
    {
        return $this->hasOne(Pemira::class, 'id', 'id_pemira');
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
}
