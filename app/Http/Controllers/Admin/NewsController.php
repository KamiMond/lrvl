<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use function PHPUnit\Framework\returnCallback;

class NewsController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
        abort(404);
    }

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
    public function store(CreateRequest $request): RedirectResponse
    {
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description']);

        $name = null;
        if($request->file('img')) {
            $path = Storage::putFile('public/images/news', $request->file('img'));
            $name = Storage::url($path);
            dd($name);
        }
        $data['img'] = $name;
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
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $data = $request->only(['category_id', 'title', 'author', 'img', 'status', 'description']);
        $name = null;
        if ($request->file('img')) {
            $request->validate([
                'img' => ['sometimes','image', 'mimes:jpeg,bmp,png, |max:1500']
            ]);
            $path = Storage::putFile('public/images/news', $request->file('img'));
            $name = Storage::url($path);
        }
        $data['img'] = $name;
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
    public function destroy(News $news): RedirectResponse
    {
        if ($news->delete()) {
            return \redirect()
                ->route('admin.news.index')
                ->with('success', 'Запись удалена.');
        }
        return \redirect()
            ->route('admin.news.index')
            ->with('error', 'Ошибка! Запись не удалена.');
    }
}
