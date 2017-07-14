<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // motionhub 首页
    public function index()
    {
        return view('home');
    }
}
