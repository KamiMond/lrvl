<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::query()
            ->with('category')
            ->paginate(5);
        return \view('news.index', ['newsList' => $news,]);
    }

    public function show(News $news): View
    {
        return \view('news.show', ['news' => $news,]);
    }
}
