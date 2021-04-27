<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigPoint extends Model
{
    protected $table = 'config_points';
    protected $fillable = [
        'config_points_price',
        'config_points_rate_change',
        'config_points_expire',
    ];
    //
}
