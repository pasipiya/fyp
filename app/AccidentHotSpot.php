<?php

namespace App;


use Jenssegers\Mongodb\Eloquent\Model;

class AccidentHotSpot extends Model
{
    protected $connection = 'mongodb';
    protected $table  = 'accident_hot_spots';


    protected $fillable = [
        'grid_code','lat','lng','position'
    ];
}
