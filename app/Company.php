<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'company_name', 'company_address','company_details','owner_id','company_status'
    ];

}
