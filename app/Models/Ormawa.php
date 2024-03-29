<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Ormawa extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "ormawa";

    protected $fillable = [
        'nama', 'logo', 'label', 'deskripsi'

    ];

    public function kandidat()
    {
        // return $this->belongsTo(Kandidat::class, 'id', 'id_ormawa');
        
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
        $toArray['logo'] = $this->logo;
        return $toArray;
    }

    public function getLogoAttribute()
    {
        return config('app.url') . Storage::url($this->attributes['logo']);
    }
}
