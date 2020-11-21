<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class AddVehicle extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'add_vehicles';

    protected $fillable = [
        'model_no',
        'registration_no',
        'chassis_no',
        'engine_no',
        'vehicle_type',
        'number_of_seat',
        'company_id',
        'owner',
        'vehicle_status',

    ];



}
