<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Kuwago_one',
            'email' => 'kuwago_one@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'kuwago_one'
        ]);

        User::create([
            'name' => 'Kuwago_two',
            'email' => 'kuwago_two@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'kuwago_two'
        ]);

        User::create([
            'name' => 'Uddesign',
            'email' => 'uddesign@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'uddesign'
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'user'
        ]);
    }
}
