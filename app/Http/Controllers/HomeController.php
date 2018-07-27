<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class HomeController extends Controller
{
    public function index()
    {
        
        $files = File::all();
        return view('pages.index', ['files' => $files]);
    }
}
