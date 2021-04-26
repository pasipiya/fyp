<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class Vehicle extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'vehicles';

    protected $fillable = [
        'company_id',
        'vehicle_manufacture',
        'vehicle_engine_type',
        'vehicle_model',
        'vehicle_horse_power',
        'vehicle_type',
        'vehicle_color',
        'vehicle_year',
        'vehicle_avarage_fuel',
        'license_plate',
        'vehicle_initial_mileage',
        'license_expiry_date',
        'insurance_expiry_date',
        'vehicle_obd_mac',
        'vehicle_gps_model',
        'vehicle_image',
        'vehicle_in_service'
    ];
//    public function addVehicle()
//    {
//        return $this->hasMany('App\AddVehicle', 'vehicle_type','id');
//    }
}
