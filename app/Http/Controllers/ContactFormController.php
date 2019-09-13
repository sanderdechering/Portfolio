<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    function create(){
        return view('contact.create');
    }

    function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Mail::to('sander.dechering@gmail.com')->send(new ContactFormMail($data));

        return redirect('/contact')->with('message', 'Thank you for your message. We\'ll be in touch!');
    }
}
