<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::updateOrCreate(
        ['email' => 'admin@donasi.test'],
        [
            'name' => 'Admin Utama',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]
    );

    User::updateOrCreate(
        ['email' => 'staff@donasi.test'],
        [
            'name' => 'Staff Donasi',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]
    );

    User::updateOrCreate(
        ['email' => 'guest@donasi.test'],
        [
            'name' => 'Guest User',
            'password' => Hash::make('password'),
            'role' => 'guest',
        ]
    );
    }
}
