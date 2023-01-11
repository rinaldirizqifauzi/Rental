<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mesin', 'logo'];


    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
