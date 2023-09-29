<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryNewsController
{
    public function index()
    {
        $categoriesList = Category::query()->paginate(10);
        return view('categoryNews.index', ['categoryNewsList' => $categoriesList,]);
    }

    public function show(Category $category): View
    {
        return view('categoryNews.show', ['categoryNews' => $category,]);
    }
}
