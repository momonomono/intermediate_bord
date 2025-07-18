<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("top");
    }

    public function store()
    {
        
        return redirect()
            ->route("top");
    }
}
