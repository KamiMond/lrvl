<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        $news = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id' )
            ->select('news.*', 'categories.title as categoryTitle')
            ->get();
        return \view('news.index', [
            'newsList' => $news,
        ]);
    }

    public function show(int $id): View
    {
        $news = DB::table('news')->find($id);
        return \view('news.show', [
            'news' => $news,
        ]);
    }
}
