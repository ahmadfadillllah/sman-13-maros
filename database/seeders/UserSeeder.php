<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'username' => 'admin',
            'email' => 'administration@gmail.com',
            'password' => Hash::make('admin123@'),
            'role' => 'admin',
            'avatar' => 'user.png'
        ]);
    }
}
