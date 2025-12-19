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
        // ADMIN
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@donasi.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // STAFF
        User::create([
            'name' => 'Staff Operasional',
            'email' => 'staff@donasi.test',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);
    }
}
