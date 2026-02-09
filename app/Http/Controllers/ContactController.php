<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // 2. Logic to send email or save to database goes here
        // Example: Mail::to('studio819ph@gmail.com')->send(new ContactMail($validated));

        // 3. Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
