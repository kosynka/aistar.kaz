<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::paginate(25);

        return view('admin.products.index', compact('data'));
    }

    public function create()
    {
        $products = Product::all();

        return view('admin.products.form', [
            'title' => 'Создание',
            'categories' => $products,
            'method' => 'POST',
            'route' => route('products.store'),
        ]);
    }

    public function store(Request $request)
    {
        Product::create($request->validate($this->rules));

        return redirect()->route('products.index')->with(['success' => 'Товар успешно создана']);
    }

    public function edit(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();

        return view('admin.products.form', [
            'title' => 'Редактирование',
            'product' => $product,
            'products' => $products,
            'categories' => $categories,
            'method' => 'PUT',
            'route' => route('products.update', $product->id)
        ]);
    }

    public function update(Product $product, Request $request)
    {
        $product->update($request->validate($this->rules));

        return redirect()->route('products.index')->with(['success' => 'Товар успешно отредактирована']);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Товар успешно удалена']);
    }

    private array $rules = [
        'name' => ['required', 'string', 'min:1'],
        'description' => ['required', 'string', 'min:1'],
        'price' => ['required', 'numeric', 'min:1'],
        'discount_price' => ['nullable', 'numeric', 'min:1'],
        'amount' => ['required', 'integer', 'min:1'],
        'category_id' => ['nullable', 'integer', 'exists:categories,id'],
    ];
}
