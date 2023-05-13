<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            ['id' => 1, 'name' => 'Technology',],
            ['id' => 2, 'name' => 'Sports',],
            ['id' => 3, 'name' => 'Health',],

        ];

        foreach ($items as $item) {
            Category::create($item);
        }
    }
}
