<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created comments.
     */
    public static function store(Request $request, $post_id)

    {
        $request->validate([
            'author' => 'bail|required|max:25',
            'content' => 'required',
        ]);

        //$post = Post::find($post_id);
        $post = \App\Post::find(3);

        $comment = new \App\Comment();
        $comment->comment_author = $request->author;
        $comment->comment_content = $request->content;
        $comment->post()->associate($post);
        $comment->save();

        return redirect('articles/'.$post_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /*$this->validate($request, array(
            'post_id' => $post_id,
            'parent_id' => $comment->parent_id,
            'comment_author' => $comment->comment_author,
            'comment_content' => $comment->comment_content
    ));*/
}
