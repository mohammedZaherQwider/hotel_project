<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded=[];

    function hotel() {
        return $this->belongsTo(Hotel::class)->withDefault();
    }
    function reservations() {
        return $this->belongsToMany(Reservation::class);
    }
    function roomType() {
        return $this->belongsTo(Room_type::class)->withDefault();
    }
    function images() {
        return $this->morphMany(Image::class,'imageable');
    }
}
