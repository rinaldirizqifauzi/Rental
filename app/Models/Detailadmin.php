<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailadmin extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'no_hp', 'foto', 'background','alamat','foto_ktp','tpt_lhr','tgl_lhr','umur'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
