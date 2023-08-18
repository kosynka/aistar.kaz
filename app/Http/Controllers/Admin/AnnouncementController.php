<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();

        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
         return view('admin.announcements.create', ['title' => _('admin.create.category')]);
    }

    public function store(Request $request)
    {
        Announcement::create($request->validate($this->rules));

        return redirect()->route('admin.announcements.index')->with(['success' => _('admin.success.create')]);
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.create', compact('announcement'));
    }

    public function update(Announcement $announcement, Request $request)
    {
        $announcement->update($request->validate($this->rules));

        return redirect()->route('admin.announcements.index')->with(['success' => _('admin.success.update')]);
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with(['success' => _('admin.success.destroy')]);
    }

    private array $rules = [
        'title' => ['required', 'string', 'min:1'],
        'description' => ['required', 'string', 'min:1'],
        'start_at' => ['nullable', 'date'],
        'end_at' => ['nullable', 'date', 'after:start_at'],
        'category_id' => ['nullable', 'integer', 'exists:categories,id'],
    ];
}
