<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    use HasFactory;

    protected $fillable = [
        'warna'
    ];

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
