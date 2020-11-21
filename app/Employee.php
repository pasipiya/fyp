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
        'name',
        'code',
        'department',
        'join_date',
        'address',
        'manager',
        'created_at',
        'updated_at',
        'employee_status',
        'company_id',
        'emp_image',
    ];

}
