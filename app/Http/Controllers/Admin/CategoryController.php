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
        return view('admin.categories.create', ['title' => __('admin.title.categories.create')]);
    }

    public function store(Request $request)
    {
        Category::create($request->validate($this->rules));

        return redirect()->route('admin.categories.index')->with(['success' => __('admin.success.create')]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->validate($this->rules));

        return redirect()->route('admin.categories.index')->with(['success' => __('admin.success.update')]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with(['success' => __('admin.success.destroy')]);
    }

    private array $rules = [
        'name' => ['required', 'string', 'between:2,255'],
        'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
        'level' => ['nullable', 'integer'],
    ];
}
