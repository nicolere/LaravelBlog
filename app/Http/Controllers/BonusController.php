<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BonusController extends Controller
{

    public function index(){

        return view('bonus/chatbot',array(
            'titre' => 'Page Bonus',
            'subheader' => 'voici la page bonus (test)'
        ));
    }

}