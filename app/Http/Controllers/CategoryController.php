<?php

namespace App\Http\Controllers;

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
        return view('categoryCreate', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $categories = new Category();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::query()->create([
            'name'=> $request['name'],
        ]);

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

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $category = Category::query()->findOrFail($id);
        $category->update([
            'name'=> $request['name'],
            'description'=> $request['description'],
        ]);

        return redirect()->route('categories.index');
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
