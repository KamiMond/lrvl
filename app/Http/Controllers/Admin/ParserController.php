<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\News;
use App\Models\Resources;
use App\Services\Interfaces\ParserInterface;
use App\Services\ParserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserInterface $parserService): RedirectResponse
    {
        $urls = Resourses:: all();

        foreach ($urls as $url) {
            dispatch(new NewsParsingJob($url->url));
        }
        return redirect(route('admin.news.index'));
    }
}
