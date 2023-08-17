<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();

        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.create', ['title' => _('admin.create.category')]);
    }

    public function store(Request $request)
    {
        Category::create($request->validate($this->rules));

        return redirect()->route('categories.index')->with(['success' => _('admin.success.create')]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.create', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->validate($this->rules));

        return redirect()->route('categories.index')->with(['success' => _('admin.success.update')]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with(['success' => _('admin.success.destroy')]);
    }

    private array $rules = [
        'name' => ['required', 'string', 'between:2,255'],
        'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
    ];
}
