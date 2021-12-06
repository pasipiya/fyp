<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class VehicleDataAcquisition extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'vehicle_data_acquisitions';

    protected $fillable = [
        'company_id',
        'vehicle_id',
        'speed',
        'rpm',
        'lng',
        'lat',
        'created_at'
    ];
}
