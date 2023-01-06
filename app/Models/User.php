<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'level',
        'status_user',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function rental()
    {
        return $this->belongsToMany(Rental::class)->withTimestamps();
    }

    public function detail()
    {
        return $this->hasMany(Detailuser::class);
    }

    public function detailadmin()
    {
        return $this->hasMany(Detailadmin::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    // Pelanggan Scope
    public function scopePelangganactive($query)
    {
        return $query->where('status_user', "active");
    }

    public function scopePelanggannonactive($query)
    {
        return $query->where('status_user', "user");
    }

    // Admin Scope
    public function scopeAdminactive($query)
    {
        return $query->where('status_user', "active");
    }

    public function scopeAdminnonactive($query)
    {
        return $query->where('status_user', null);
    }
}
