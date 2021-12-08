<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Settings extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'settings';

    protected $fillable = [
        'company_id',
        'setting_type',
        'gps',
        'rpm',
        'speed',
        'vehicle_run_time',
        'frequency',
        'speed_alert',
        'rpm_alert',
        'speed_limit',
        'rpm_limit'
    ];
}
