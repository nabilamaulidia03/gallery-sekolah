<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}
