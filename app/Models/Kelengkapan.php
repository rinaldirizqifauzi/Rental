<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama', 'parent_id'
    ];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }
}
