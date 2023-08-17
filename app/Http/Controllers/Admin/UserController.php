<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(25);

        return view('users.index', compact('data'));
    }

    public function show(string $id)
    {
        //
    }
}
