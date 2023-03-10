<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tipe', 'gambar' ,'gambar1', 'gambar2', 'gambar3', 'kode_tipe'
    ];


    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
