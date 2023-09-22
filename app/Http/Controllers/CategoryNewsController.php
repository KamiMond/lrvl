<?php

namespace App\Http\Controllers;

class CategoryNewsController
{
    use CategoryNewsTrait;

    public function index()
    {
        return view('categoryNews.index', [
            'categoryNewsList' => $this->getCategoriesNews(),
        ]);
    }

    public function show(int $id)
    {
        return view('categoryNews.show', [
            'categoryNews' => $this->getCategoriesNews($id),
            ]);
    }
}
