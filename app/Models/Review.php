<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['boarding_house_id', 'comment', 'rating'];

    public function boardingHouse() {
        return $this->belongsTo(BoardingHouse::class);
    }
}
