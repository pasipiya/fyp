<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Super Admin',
               'email'=>'itecgenies@gmail.com',
               'user_type'=>'Admin',
               'password'=> bcrypt('123456'),
               'is_role'=>'Super',
               'user_status'=>'1',

            ],
            [
                'name'=>'Company1',
                'email'=>'company1@gmail.com',
                'user_type'=>'Client',
                'password'=> bcrypt('123456'),
                'is_role'=>'Owner',
                'user_status'=>'1',
            ],
            [
                'name'=>'Company2',
                'email'=>'company2@gmail.com',
                'user_type'=>'Client',
                'password'=> bcrypt('123456'),
                'is_role'=>'Owner',
                'user_status'=>'1',
            ],


        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
