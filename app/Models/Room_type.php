<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    use HasFactory;
    protected $guarded=[];
    function room() {
        return $this->hasOne(Room::class)->withDefault();
    }
}
