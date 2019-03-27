<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create() {
        return view('contact/contact',array(
            'titre' => 'Page Contact',
            'subheader' => 'Formulaire de contact',
        ));
    }

    public function store(ContactRequest $request) {

        // $contact = \App\Contact::create ($request->all());
    
        $contact = new \App\Contact;
        $contact->fill($request->all());
        $contact->contact_date = now();
        $contact->save();


        $contacts = \App\Contact::all();
        return view('contact/confirmation',array(
            'titre' => 'Page Confirmation',
            'subheader' => 'Confirmation d"envoi',
            'message' => 'Merci. Votre message a été transmis. Vous recevrez une réponse soon.',
            'contacts' => $contacts
        ));

        
    }
}
