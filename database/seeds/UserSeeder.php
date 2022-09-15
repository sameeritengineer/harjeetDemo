<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@restaurant.com';
        $user->password = \Hash::make('admin@123');
        $user->role = 'admin'; 
        $user->save();  
      }
}
