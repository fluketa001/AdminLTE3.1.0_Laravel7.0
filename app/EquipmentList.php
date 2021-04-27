<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentList extends Model
{
    protected $table = 'equipments_list';
    protected $fillable = [
        'rooms_id',
        'equipments_id',
    ];
    //
}
