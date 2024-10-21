<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'maplink', 'policies', 'curfew',
        'gender', 'profile_picture'
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function photos() {
        return $this->hasMany(BoardingHousePhoto::class);
    }

    public function extraInfo() {
        return $this->hasOne(HouseExtraInfo::class);
    }
}
