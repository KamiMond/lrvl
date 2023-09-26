<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }
    public function getData(): array
    {
        $quantityCategory = 10;
        $categoriesList = [];
        for($i = 1; $i <= $quantityCategory; $i++) {
            $categoriesList[$i] = [
                'title' => fake()->jobTitle(),
                'description' => fake()->text,
                'created_at' => now(),
            ];
        }
        return $categoriesList;
    }
}
