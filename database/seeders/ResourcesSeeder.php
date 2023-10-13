<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert($this->getResources());
    }

    public function getResources()
    {
        return
            [
                [
                    'url' => "https://news.rambler.ru/rss/world/",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/articles/",
                ],
                [
                    'url' => "https://news.rambler.ru/rss/community/",
                ],

        ];
    }
}
