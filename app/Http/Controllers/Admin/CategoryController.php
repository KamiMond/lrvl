<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CategoryNewsTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{

    use CategoryNewsTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $newsCategories = DB::table('categories')->get();
        return \view('admin.categories.index', [
            'categoriesNewsList' => $newsCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->flash();
        $data = $request->all();
        $categories = DB::table('categories')->count();

        DB::table('categories')->insert([
            'id'=> $categories + 1,
            'title' => $data['title'],
            'description' => $data['description'],
            'created_at' => now(),
        ]);
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
