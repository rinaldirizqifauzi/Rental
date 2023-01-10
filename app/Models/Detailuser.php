<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'no_hp', 'email', 'username', 'foto', 'background','alamat','foto_ktp','foto_kk'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
