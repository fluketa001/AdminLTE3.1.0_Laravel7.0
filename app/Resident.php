<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';
    protected $fillable = [
        'residents_name',
        'residents_telephone',
        'residents_career',
        'residents_rent_price',
        'residents_contract_start',
        'residents_contract_end',
        'residents_address',
        'residents_emergency',
        'residents_status',
        'residents_note',
        'rooms_id',
    ];
    //
}
