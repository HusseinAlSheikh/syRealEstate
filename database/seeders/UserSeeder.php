<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'  => 'superAdmin' ,
                'email' => 'super@syestate.com' ,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'user_type' => 'SUPER'
            ],[

                'name'  => 'admin' ,
                'email' => 'admin@syestate.com' ,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'user_type' => 'ADMIN'
            ],[

                'name'  => 'agent' ,
                'email' => 'agent@syestate.com' ,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'user_type' => 'AGENT'
            ]
        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
