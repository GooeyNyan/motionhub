<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hotcontroller extends Controller
{
    //
    public function index()
    {
        return hot::all();
    }
