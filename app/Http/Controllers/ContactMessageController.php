<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Message sent successfully.');
    }

    public function show(ContactMessage $message)
    {
        // return view('messages.show', compact('message'));
        return ;
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
