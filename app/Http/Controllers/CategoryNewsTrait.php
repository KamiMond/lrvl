<?php
declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoryNewsTrait
{
    private array $categoryList = [
        [
            "id" => "1",
            "title" => "sport",
            "description" => "Спорт"
        ],
        [
            "id" => "2",
            "title" => "politic",
            "description" => "Общество"
        ],
        [
            "id" => "3",
            "title" => "art",
            "description" => "Творчество"
        ]
    ];


    public function getCategoriesNews(int $id = null): array
    {
        $categoryNews = $this->categoryList;
        foreach ($categoryNews as $categoryNew) {
            if ($categoryNew['id'] === $id) {
                return $categoryNew;
            }
        }
        return $this->categoryList;
    }
    public function addCategory(array $category): void
    {
        //
    }
}
