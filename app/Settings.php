<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Settings extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'settings';

    protected $fillable = [
        'company_id',
        'user_type',
        

    ];
}
