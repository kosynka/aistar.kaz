<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Category;

class AnnouncementController extends Controller
{
    public function index()
    {
        $data = Announcement::paginate(25);

        return view('admin.announcements.index', compact('data'));
    }

    public function create()
    {
        $announcement = Announcement::all();
        $categories = Category::all();

        return view('admin.announcements.form', [
            'title' => 'Создание',
            'announcement' => $announcement,
            'categories' => $categories,
            'method' => 'POST',
            'route' => route('announcements.store'),
        ]);
    }

    public function store(Request $request)
    {
        Announcement::create($request->validate($this->rules));

        return redirect()->route('announcements.index')->with(['success' => 'Обратная связь успешно создана']);
    }

    public function edit(Announcement $announcements)
    {
        $announcement = Announcement::all();
        $categories = Category::all();

        return view('admin.announcements.form', [
            'title' => 'Редактирование',
            'announcements' => $announcements,
            'announcement' => $announcement,
            'categories' => $categories,
            'method' => 'PUT',
            'route' => route('announcements.update', ['announcement' => $announcements->id])
        ]);
    }

    public function update(Announcement $announcements, Request $request)
    {
        $announcements->update($request->validate($this->rules));

        return redirect()->route('announcements.index')->with(['success' => 'Обратная связь успешно создана']);
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('announcements.index')->with(['success' => 'Обратная связь успешно удалена']);
    }

    private array $rules = [
        'title' => ['required', 'string', 'min:1'],
        'description' => ['required', 'string', 'min:1'],
        'start_at' => ['nullable', 'date'],
        'end_at' => ['nullable', 'date', 'after:start_at'],
        'category_id' => ['nullable', 'integer', 'exists:categories,id'],
    ];
}
