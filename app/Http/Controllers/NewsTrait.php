<?php
declare(strict_types=1);
namespace App\Http\Controllers;
trait NewsTrait {

    public function getNews(int $id = null): array
    {

        $newsArray = $this->newsArray();
        foreach ($newsArray as $news) {
            if($news['id'] === $id) {
                return $news;
            }
        }

        return $newsArray;
    }
    public function newsArray(): array
    {
        return [
            [
                'id' => 1,
                'title' => fake()->jobTitle(),
                'img' => fake()->imageUrl(),
                'description' => fake()->text(150),
                'author' => fake()->userName(),
                'status' => 'ACTIVE',
                'created_at' => now()->format('d-m-Y H:i'),
                'id_category' => '1'
            ],
            [
                'id' => 2,
                'title' => fake()->jobTitle(),
                'img' => fake()->imageUrl(),
                'description' => fake()->text(150),
                'author' => fake()->userName(),
                'status' => 'ACTIVE',
                'created_at' => now()->format('d-m-Y H:i'),
                'id_category' => '2'
            ],
            [
                'id' => 3,
                'title' => fake()->jobTitle(),
                'img' => fake()->imageUrl(),
                'description' => fake()->text(150),
                'author' => fake()->userName(),
                'status' => 'ACTIVE',
                'created_at' => now()->format('d-m-Y H:i'),
                'id_category' => '1'
            ],
            [
                'id' => 4,
                'title' => fake()->jobTitle(),
                'img' => fake()->imageUrl(),
                'description' => fake()->text(150),
                'author' => fake()->userName(),
                'status' => 'ACTIVE',
                'created_at' => now()->format('d-m-Y H:i'),
                'id_category' => '2'
            ],
            [
                'id' => 5,
                'title' => fake()->jobTitle(),
                'img' => fake()->imageUrl(),
                'description' => fake()->text(150),
                'author' => fake()->userName(),
                'status' => 'ACTIVE',
                'created_at' => now()->format('d-m-Y H:i'),
                'id_category' => '1'
            ],
        ];
    }
}
