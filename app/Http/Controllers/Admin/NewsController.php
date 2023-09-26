<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newsList = DB::table('news')->get();
        return \view('admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoryList = DB::table('categories')
            ->select('categories.id','categories.title')->get();
        return \view('admin.news.create', ['categories' => $categoryList]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->flash();
        $news = $request->all();

        $imgPath = 'storage/' . $request->file('img')->store('images');

        $newsCount = DB::table('news')->count();

        $categoryIdList = DB::table('categories')->select('categories.id', 'categories.title')->get();
        $categoryId = 1;
        foreach ($categoryIdList as $category) {
            if($news['category_id'] === $category->title) {
                $categoryId = $category->id;
            }
        }

        DB::table('news')
            ->insert([
                'id' => $newsCount + 1,
                'category_id' => $categoryId,
                'title' => $news['title'],
                'author' => $news['author'],
                'status' => $news['status'],
                'description' => $news['description'],
                'img' => $imgPath,
                'created_at' => now(),
            ]);

        return redirect()
            ->route('admin.news.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
