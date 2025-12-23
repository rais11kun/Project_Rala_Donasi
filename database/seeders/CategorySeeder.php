<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::insert([
    [
        'name' => 'Donasi Pendidikan',
        'description' => 'Donasi untuk mendukung pendidikan dan sekolah'
    ],
    [
        'name' => 'Donasi Kesehatan',
        'description' => 'Donasi untuk biaya pengobatan dan layanan kesehatan'
    ],
    [
        'name' => 'Donasi Bencana',
        'description' => 'Donasi untuk korban bencana alam'
    ],
    [
        'name' => 'Donasi Sosial',
        'description' => 'Donasi untuk kegiatan sosial dan kemanusiaan'
    ],
]);
    }
}
