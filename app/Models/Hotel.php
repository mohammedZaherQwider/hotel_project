<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded=[];
    function city() {
        return $this->belongsTo(City::class)->withDefault();
    }
    function rooms()  {
        return $this->hasMany(Room::class);
    }

    function images() {
        return $this->morphMany(Image::class,'imageable');
    }
}
