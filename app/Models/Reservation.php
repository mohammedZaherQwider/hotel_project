<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded=[];

    function rooms() {
        return $this->belongsToMany(Room::class);
    }
    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }
}
