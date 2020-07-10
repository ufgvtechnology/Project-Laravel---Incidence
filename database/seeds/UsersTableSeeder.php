<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
        	'name' =>     'Maria',
        	'email'=>     'support@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 0
        ]);

        User::create([
        	'name' => 'Juan',
        	'email' => 'juan@gmail.com',
        	'password' => bcrypt('123123'),
        	'role' => 1
        ]);

        User::create([
        	'name' => 'Vanessa',
        	'email'=>'supportvanessa@gmail.com',
        	'password'=> bcrypt('123123'),
        	'role'=>2
        ]);

    }
}
