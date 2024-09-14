<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact.form');
    }

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact message
        ContactMessage::create($validated);

        // Redirect with success message
        return redirect()->back()->with('status', 'Message sent successfully!');
    }

    // Show all contact messages for admins
    public function index()
    {
        $messages = ContactMessage::all();
        return view('contact.index', compact('messages'));
    }

    // Handle the reply
    public function reply(Request $request, $id)
    {
        // Validate the reply content
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Find the contact message
        $message = ContactMessage::findOrFail($id);

        // Send email to the user
        Mail::to($message->email)->send(new ContactReplyMail($request->input('reply'), $message));

        // Redirect with success message
        return redirect()->back()->with('status', 'Reply sent successfully!');
    }
}
