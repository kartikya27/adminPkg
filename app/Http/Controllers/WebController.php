<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        //
    }

    public function sabkoShiksha(){
        return view('sabko');
    }

    public function volunteer(){
        return view('volunteer');
    }

    public function successStories(){
        return view('success-stories');
    }

    public function events(){
        return view('events');
    }

    public function gallery(){
        return view('gallery');
    }
}
