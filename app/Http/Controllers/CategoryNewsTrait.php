<?php

namespace App\Http\Controllers;

trait CategoryNewsTrait
{
    use NewsTrait;
    public function getCategoryNews(int $category = null): array
    {

        $categoryNews = [];
        $quantityCategory = 5;
        if($category === null) {
            for($i = 1; $i <= $quantityCategory; $i++) {
                $categoryNews[$i] =
                    [
                        "id" => $i,
                        "title" => fake()->jobTitle(),
                        "description" => fake()->text(100),
                    ];
            }
            return $categoryNews;
        }
        return [
            'id' => $category,
            'title' => fake()->jobTitle(),
            'description' => fake()->text(100),
        ];
    }
}
