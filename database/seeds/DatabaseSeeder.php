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
               'email'=>'superadmin@gmail.com',
               'password'=> bcrypt('123456'),
               'is_role'=>'1',
               'user_status'=>'1',
               
            ],
            
            [
                'name'=>'Company1',
                'email'=>'company1@gmail.com',
                'password'=> bcrypt('123456'),
                'is_role'=>'2',
                'user_status'=>'1',
                
             ],
             

        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
