<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // 注册界面
    public function index()
    {
        return view('auth.register');
    }

    // 注册逻辑
    public function store(Request $request)
    {
        // 验证
        $this->validate($request, [
            'name' => 'required|string|min:1|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:60|confirmed'
        ]);

        // 逻辑
        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        User::create(compact('name', 'email', 'password'));

        // 渲染
        return redirect()->route('login');
    }
}
