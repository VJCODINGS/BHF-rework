<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardingHousePhoto extends Model
{
    protected $fillable = ['boarding_house_id', 'photo_path'];

    public function boardingHouse() {
        return $this->belongsTo(BoardingHouse::class);
    }
}
