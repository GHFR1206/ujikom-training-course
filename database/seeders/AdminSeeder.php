<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 0,
            'phone' => '088888888888',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => 1,
            'phone' => '085777267020',
            'password' => Hash::make('user'),
        ]);
    }
}
