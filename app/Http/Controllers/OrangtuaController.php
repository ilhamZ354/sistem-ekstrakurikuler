<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    public function index(){
        return view('layouts.orangtua.index');
    }
}
