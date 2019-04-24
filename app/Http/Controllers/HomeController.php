<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller 
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Post::orderBy('post_date','desc')->take(3)->get(); //get 3 last posts
        return view('welcome',array(
            'posts' => $posts,
            'titre' => 'Blog',
            'subheader' => 'bienvenue sur notre Blog Laravel.'
        ));
    }
}