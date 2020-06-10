<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with('page', 'Home');
    }

    public function aboutme()
    {
        return view('aboutme')->with('page', 'About Me');
    }

    public function projects()
    {
        return view('projects')->with('page', 'My Work');
    }

    public function blog()
    {
        return view('blog')->with('page', 'Blog');
    }

    public function gallery()
    {
        return view('gallery')->with('page', 'Gallery');
    }

    public function contact()
    {
        return view('contact')->with('page', 'Contact');
    }
}
