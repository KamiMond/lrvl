<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function PHPUnit\Framework\returnCallback;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newsList = News::query()
            ->status()
            ->with('category')
            ->orderByDesc('id')
            ->paginate(5);
        $newsList->withQueryString();
        return \view('admin.news.index', ['newsList' => $newsList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoryList = Category::all();
        return \view('admin.news.create', ['categories' => $categoryList]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->flash();
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description', 'created_at']);

        $news = new News($data);
        if($news->save()) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Добавлена новая новость.');
        }
        return back()
            ->with('error', 'Ошибка! Не удалось добавить новость.');
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
    public function edit(News $news): View
    {
        $categories = Category::all();
        return \view('admin.news.edit', [
            'categories' => $categories,
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->flash();
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description', 'created_at']);
        $news->fill($data);
        if ($news->save()) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Данные обновлены.');
        }
        return back()->with('error', 'Ошибка! Не удалось обновить данные.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
