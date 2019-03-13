<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('articles');
    }

    public function show($post_name) {
        $post = \App\Post::where('post_name',$post_name)->first(); //get first post with post_nam == $post_name
       
        return view('articles/single',array( //Pass the post to the view
            'post' => $post
        ));
     }
     
}
