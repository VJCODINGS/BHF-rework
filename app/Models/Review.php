<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'rating',
        'user_id',
        'boarding_house_id'
    ];

    public function boardingHouse() {
        return $this->belongsTo(BoardingHouse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
