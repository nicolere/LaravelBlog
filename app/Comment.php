<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    //Un commentaire appartient à un post
    public function post()
   {
       return $this->belongsTo('App\Post');
   }

}

