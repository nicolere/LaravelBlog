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

    /**
    * Fetch all messages
    *
    * @return Message
    */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
    * Persist message to database
    *
    * @param  Request $request
    * @return Response
    */
    public function sendMessage(Request $request)
    {
        $user = \App\User::inRandomOrder()->first();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        return ['status' => 'Message Sent!'];
    }
}
