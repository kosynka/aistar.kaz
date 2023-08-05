<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/login');
    }

    public function signin(LoginRequest $request)
    {
        $data = $request->validated();

        $adminRole = Role::where('name', 'admin')->first;
        $admin = User::where([
            'phone', $data['phone'],
            'role_id', $adminRole->id,
        ])->first();

        if (is_null($admin)) {
            return redirect()->back()->with('error', 'Неверный телефон или пароль');
        }

        if (!Hash::check($data['password'], $admin->password)) {
            return redirect()->back()->with('error', 'Неверный телефон или пароль');
        }

        $remember = false;
        if (isset($data['remember'])) {
            $remember = true;
        }

        Auth::guard('web')->login($admin, $remember);

        return redirect('/dashboard');
    }
}
