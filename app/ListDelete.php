<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDelete extends Model
{
    protected $table = 'list_deletes';
    protected $fillable = [
        'rents_id',
        'rents_month',
        'rents_month_end',
        'rents_datetime',
        'rents_slip',
        'rents_payment',
        'rooms_number',
        'rooms_house_number',
        'residents_name',
        'residents_telephone',
        'residents_rent_price',
        'residents_id',
        'users_name',
        'informer',
    ];
    //
}
