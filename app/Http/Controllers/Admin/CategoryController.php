<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::paginate(25);

        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.form', [
            'title' => 'Создание',
            'categories' => $categories,
            'method' => 'POST',
            'route' => route('categories.store'),
        ]);
    }

    public function store(Request $request)
    {
        Category::create($request->validate($this->rules));

        return redirect()->route('categories.index')->with(['success' => 'Категория успешно создана']);
    }

    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.categories.form', [
            'title' => 'Редактирование',
            'category' => $category,
            'categories' => $categories,
            'method' => 'PUT',
            'route' => route('categories.update', $category->id)
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->validate($this->rules));

        return redirect()->route('categories.index')->with(['success' => 'Категория успешно отредактирована']);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with(['success' => 'Категория успешно удалена']);
    }

    private array $rules = [
        'name' => ['required', 'string', 'between:2,255'],
        'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
    ];
}
