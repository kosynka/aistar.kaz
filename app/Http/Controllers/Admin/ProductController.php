<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create',['title'=>_('admin.title.products.create')];
    }

    public function store(Request $request)
    {
        Product::create($request->validate($this->rules));

        return redirect()->route('admin.products.index')->with(['succes'=>_('admin.success.create')]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $product->update($request->validate($this->rules));

        return redirect()->route('admin.products.index')->with(['success' => _('admin.success.update')]);
    }

    public function destroy(string $id)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with(['success' => _('admin.success.destroy')]);
    }

    private array $rules = [
        'name' => ['required', 'string', 'min:1'],
        'description' => ['required', 'string', 'min:1'],
        'price' => ['required', 'numeric', 'min:1'],
        'discount_price' => ['required', 'nullable', 'numeric', 'min:1'],
        'amount' => ['required', 'integer', 'min:1'],
        'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
        'relevance_weight' => ['required','nullable', 'integer', 'min:1'],
        'rating' => ['required', 'integer', 'nullable', 'min:1'],
        'prosklad_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
        'views_count' => ['required', 'integer', 'nullable', 'min:1'],
        'views_count' => ['required', 'string', 'unique', 'min:1'],
    ];
}
