<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'rooms_number', 'rooms_house_number', 'rooms_type', 'rooms_size', 'rooms_status', 'rooms_building', 'rooms_direction', 'rooms_standard_price','rooms_contract_type',
    ];
    //
}
