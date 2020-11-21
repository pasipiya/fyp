<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class Vehicle extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'vehicles';

    protected $fillable = [
        'vehicle_type',
        'status'       
    ];
//    public function addVehicle()
//    {
//        return $this->hasMany('App\AddVehicle', 'vehicle_type','id');
//    }
}
