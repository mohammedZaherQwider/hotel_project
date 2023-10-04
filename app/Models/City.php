<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded=[];
    function country() {
        return $this->belongsTo(Countries::class)->withDefault();
    }
    function hotels() {
        return $this->hasMany(Hotel::class);
    }
}
