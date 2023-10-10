<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\ParserInterface;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserInterface $parserService)
    {
        $url = "https://lenta.ru/rss";

        $data = $parserService->setLink($url)->saveParseData();

        foreach ($data['news'] as $category) {
            $categories = Category::all();
            if($categories->contains('title','=', $category['category'])) {
                $cat = Category::query()
                    ->where('title', '=', $category['category'])->first();
            } else {
                $cat = Category::create([
                    'title' => $category['category'],
                    'description' => $category['title']
                ]);
            }

            News::FirstOrCreate([
                'title' => $category['title'],
                'author' => $category['author'],
                'img' => $category['enclosure::url'],
                'status' => fake()->randomElement(Status::getEnums()),
                'description' => $category['description'],
                'category_id' => $cat->id,
                'created_at' => now(),
            ]);
        }
    }
}
