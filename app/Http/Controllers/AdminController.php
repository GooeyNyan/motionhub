<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.admin');
    }

    public function store(Request $request)
    {
        $user_id = $request->get('name');
        $user = User::find($user_id);
        $user->is_admin = 1;
        $user->save();
        return redirect()->route('home');
    }

    public function showDelete()
    {
        return view('auth.adminDelete');
    }

    public function delete(Request $request)
    {
        $user_id = $request->get('name');
        $user = User::find($user_id);
        $user->is_admin = 0;
        $user->save();
        return redirect()->route('home');
    }
}
