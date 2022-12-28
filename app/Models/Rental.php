<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tipe','id_warna','id_mesin','id_spesifikasi','id_kelengkapan','status', 'no_polisi_1','no_polisi_2','no_polisi_3','bb','kode_mobil','harga'
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'id_mesin');
    }

    public function warna()
    {
        return $this->belongsTo(Warna::class, 'id_warna');
    }

    public function spesifikasi()
    {
        return $this->belongsTo(Spesikasi::class, 'id_spesifikasi');
    }

    public function kelengkapan()
    {
        return $this->belongsToMany(Kelengkapan::class)->withTimestamps();
    }

    public function scopePublish($query)
    {
        return $query->where('status', "Tersedia");
    }

    public function scopeDraft($query)
    {
        return $query->where('status', "Tidak Tersedia");
    }
}
