<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;
class Employee extends Model
{
    //use SoftDeletes;
    protected $connection = 'mongodb';
    protected $table = 'employee';

    protected $fillable = [
        'department_id',
        'employee_type',
        'employee_name',
        'company_id',
        'employee_status',
    ];

}
