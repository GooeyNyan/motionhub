<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 登录页面
    public function index()
    {
        return view('auth.login');
    }

    // 登录
    public function login(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string',
            'password' => 'required|min:6|max:60|'
        ]);

        $user = $request->only('name', 'password');
//        $is_remember = boolval($request->get('is_remember'));

        if (Auth::attempt($user)) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('用户名和密码不匹配');
    }

    // 登出
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
