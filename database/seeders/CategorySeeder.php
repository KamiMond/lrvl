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
        return
            [
                [
                    'title' => 'Общество',
                    'description' => 'Всё самое важное о событиях в мире',
                    'created_at' => now()
                ],
                [
                    'title' => 'Экономика',
                    'description' => 'Основные тренды в сфере финансов',
                    'created_at' => now()
                ],
                [
                    'title' => 'Спорт',
                    'description' => 'Главные нвости в спортивном мире',
                    'created_at' => now()
                ],
                [
                    'title' => 'Наука',
                    'description' => 'Научные открытия, прорывы, эксперименты',
                    'created_at' => now()
                ],
                [
                    'title' => 'Культура',
                    'description' => 'Вести из мира искусства и творчества',
                    'created_at' => now()
                ]
            ];
    }
}
