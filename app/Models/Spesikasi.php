<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'tahun', 'id_tipe', 'sheet'
    ];

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
