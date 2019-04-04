<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    
    /**
    * Show chats
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('message/chat',array(
            'titre' => 'Page Tchat',
            'subheader' => 'Viens chatter avec nous, on est bien'
        ));
    }

}
