<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'email',
        'status',
        'user_id',
        'boarding_house_id'
    ];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to BoardingHouse
    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }
}
