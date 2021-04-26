<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class SoftPABX extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'soft_pabx';
    protected $fillable = [
        'employee_name',
        'employee_type',
        'username',
        'pabx_number',
        'secret_key',
        'server_name',
        'status',
    ];
}
