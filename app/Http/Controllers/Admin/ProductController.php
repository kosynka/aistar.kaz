<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::with('category')->orderBy('relevance_weight', 'desc')->orderBy('id')->paginate(25);

        return view('admin.products.index', compact('data'));
    }

    public function create()
    {
        return view('admin.products.create', ['title' => _('admin.title.products.create')]);
    }

    public function store(Request $request)
    {
        Product::create($request->validate($this->rules));

        return redirect()->route('products.index')->with(['succes'=>_('admin.success.create')]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $product->update($request->validate($this->rules));

        return redirect()->route('products.index')->with(['success' => _('admin.success.update')]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with(['success' => _('admin.success.destroy')]);
    }

    private array $rules = [
        'name' => ['required', 'string', 'min:1'],
        'description' => ['required', 'string', 'min:1'],
        'price' => ['required', 'numeric', 'min:1'],
        'discount_price' => ['nullable', 'numeric', 'min:1'],
        'amount' => ['required', 'integer', 'min:1'],
        'category_id' => ['nullable', 'integer', 'exists:categories,id'],
        'has_discount' => ['nullable', 'bool'],
        'relevance_weight' => ['nullable', 'integer'],
        'rating' => ['nullable', 'integer', 'min:1'],
        'prosklad_id' => ['nullable', 'integer'],
    ];
}
