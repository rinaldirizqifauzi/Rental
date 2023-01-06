<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','status_transaksi','rental_id','tgl_mulai','tgl_selesai','pick_up','driver_confirm','total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }
}
