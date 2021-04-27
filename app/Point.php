<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $fillable = [
        'points_amount',
        'points_expire',
        'residents_id',
    ];
    //
}
