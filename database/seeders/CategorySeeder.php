<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Teknologi & IT',
            'description' => 'Prestasi dalam bidang teknologi informasi dan komputer.',
        ]);

        Category::create([
            'name' => 'Seni & Budaya',
            'description' => 'Prestasi dalam bidang seni dan budaya.',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'description' => 'Prestasi dalam bidang olahraga.',
        ]);

        Category::create([
            'name' => 'Akademik',
            'description' => 'Prestasi dalam bidang akademik.',
        ]);

        Category::create([
            'name' => 'Sosial',
            'description' => 'Prestasi dalam bidang sosial dan kemasyarakatan.',
        ]);
    }
}
