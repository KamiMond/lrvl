<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourcesRequest;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin/resources/index', ['resources' => Resources::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourcesRequest $request)
    {
        $resources = Resources::create([
            'url' => $request->get('url')
        ]);

        if($resources->save()) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', 'URL сохранен в базу данных.');
        }
        return back()
            ->with('error', 'Ошибка! Не удалось сохранить URL.');
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
    public function edit(Resources $resources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $url = Resources::find($request->get('id'));
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Resources $resources)
    {
        $resources->delete();
        return redirect()
            ->route('admin.resources.index')
            ->with('success', 'URL удалён.');
    }
}
