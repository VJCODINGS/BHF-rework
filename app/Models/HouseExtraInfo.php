<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseExtraInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'boarding_house_id', 'number_of_CR', 'wifi', 'secure_entry_system',
        'kitchen_use', 'laundry_facilities', 'storage_spaces',
        'air_conditioning', 'parking_area', 'pet_friendly', 'study_area',
        'recreational_facilities', 'backyard_or_garden_access',
    ];

    protected $casts = [
        'wifi' => 'boolean', 'secure_entry_system' => 'boolean',
        'kitchen_use' => 'boolean', 'laundry_facilities' => 'boolean',
        'storage_spaces' => 'boolean', 'air_conditioning' => 'boolean',
        'parking_area' => 'boolean', 'pet_friendly' => 'boolean',
        'study_area' => 'boolean', 'recreational_facilities' => 'boolean',
        'backyard_or_garden_access' => 'boolean',
    ];

    public function boardingHouse() {
        return $this->belongsTo(BoardingHouse::class);
    }
}

