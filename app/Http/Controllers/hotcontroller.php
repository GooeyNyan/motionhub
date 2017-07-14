<?php

namespace App\Http\Controllers;

use App\Hot;
use Illuminate\Http\Request;

class HotController extends Controller
{
    //
    public function index()
    {
        return Hot::all();
    }
}
