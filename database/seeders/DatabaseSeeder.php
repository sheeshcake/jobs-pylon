<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "f_name" => "Pylon",
            "l_name" => "HR",
            "email" => "pylonglobal@gmail.com",
            "profile_image" => "none",
            "username" => "admin",
            "password" => Hash::make('admin'),
        ]);
        User::create([
            "f_name" => "User",
            "l_name" => "User",
            "email" => "user@gmail.com",
            "profile_image" => "none",
            "username" => "user",
            "password" => Hash::make('user'),
        ]);
    }
}
