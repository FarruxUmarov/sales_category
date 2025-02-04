<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $products = Product::all();
        $categories = Category::all();

        return view('productList', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('productCreate', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        if ($request->validated()) {
        Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'total_price' => $request->get('price') * $request->get('quantity'),
        ]);
        }

        return redirect()->route('products.create')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('productCreate', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CategoryRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        Product::query()->FindOrFail($id)->update([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'price' => $request->get('price'),
            'quantity' => $request->get('quantity'),
            'total_price' => $request->get('price') * $request->get('quantity'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
