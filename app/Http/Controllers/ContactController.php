<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store()
    {
        Contact::create(
            request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'subject' => 'nullable|min:5|max:50',
                'message' => 'required|min:5|max:500'
            ])
        );

        return redirect()->route('contact.create')->with('success', 'Your Message has been sent');
    }
}
