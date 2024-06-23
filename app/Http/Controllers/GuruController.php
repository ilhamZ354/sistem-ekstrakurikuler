<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        return view('layouts.guru.index');
    }

    public function create(){
        return view('layouts.guru.input');
    }
}
