<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CategoryNewsController
{
    use CategoryNewsTrait;

    public function index()
    {
        $categoriesList = DB::table('categories')->get();
        return view('categoryNews.index', ['categoryNewsList' => $categoriesList,]);
    }

    public function show(int $id)
    {
        $categoryNews = DB::table('categories')->find($id);
        $newsList = DB::table('news')
            ->where('category_id', '=', $id)->get();
        return view('categoryNews.show', [
            'categoryNews' => $categoryNews,
            'newsList' => $newsList,
            ]);
    }
}
