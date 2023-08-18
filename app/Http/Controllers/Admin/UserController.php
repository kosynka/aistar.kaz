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

    public function show(string $id)
    {
        //
    }
}
