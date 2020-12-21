<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = ['superAdmin', 'admin', 'employee'];

        foreach ($roles as $role){

            $role = User::create([
                'name' => $role,
                'email' => $role .'@'. $role .'.com',
                'email_verified_at' => now(),
                'password' => Hash::make(123123), // 123123
                'remember_token' => Str::random(10),
                'role_id' => rand(1,3),
            ]);

            $role -> attachRole($role);
        }


    }
}
