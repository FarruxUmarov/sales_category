<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a indexing of the resource.
     */
    public function index(): View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('categoryList', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('categoryCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->validated()) {
            Category::query()->create([
                'name' => $request->get('name'),
            ]);
        }
        return redirect()->route('categories.create');
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
    public function edit(string $id): View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $category = Category::query()->findOrFail($id);

        return view('categoryCreate', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        if ($request->validated()) {
            Category::query()->findOrFail($id)->update([
                'name' => $request->get('name'),
            ]);
        }

        return redirect()->route('categories.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
