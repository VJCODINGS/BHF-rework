<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'maplink',
        'description',
        'policies',
        'gender',
        'profile_picture',
        'user_id'
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

    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
