<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'nom' => 'required',
            'message' => 'required'
        ]);

        Mail::to('rsoyiffi12@gmail.com')->send(new ContactMail($data));

        return back()->with('contact', 'You\'re email was sent successfully');
    }
}
