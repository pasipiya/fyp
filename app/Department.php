<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;
class Department extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'department';
    protected $fillable = [
        'department_name','company_id','department_status'
    ];

}
