<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::with('city')->paginate(20);

        return view('admin.users.index', compact('data'));
    }

    public function create()
    {
        $announcement = User::all();
        $categories = Category::all();

        return view('admin.users.form', [
            'title' => 'Создание',
            'announcement' => $announcement,
            'categories' => $categories,
            'method' => 'POST',
            'route' => route('announcements.store'),
        ]);
    }

    public function store(Request $request)
    {
        User::create($request->validate($this->rules));

        return redirect()->route('users.index')->with(['success' => 'Обратная связь успешно создана']);
    }

    public function edit(User $user)
    {
        $users = User::all();

        return view('admin.users.form', [
            'title' => 'Редактирование',
            'users' => $users,
            'user' => $user,
            'method' => 'PUT',
            'route' => route('users.update', ['user' => $user->id])
        ]);
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->validate($this->rules));

        return redirect()->route('users.index')->with(['success' => 'Обратная связь успешно создана']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with(['success' => 'Обратная связь успешно удалена']);
    }

    private array $rules = [
        'fio' => ['required', 'string', 'min:1'],
        'phone' => ['required', 'string', 'min:1'],
        'city_id' => ['required', 'integer', 'exists:cities,id'],
        'role_id' => ['required', 'integer', 'exists:roles,id'],
        'password' => ['required', 'string', 'min:6'], 
    ];
}


