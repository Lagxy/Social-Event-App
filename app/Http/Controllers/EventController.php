<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class EventController extends Controller
{
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->hashName(); // Generate unique filename
            $file->storeAs('images', $filename, 'public'); // Store in images subdirectory
        }

        Event::create([
            'image_path' => $filename, // Store just the filename
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'time' => now()->format('H:i:s'),
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Event created successfully!');
    }
    public function edit(Event $event)
    {
        $user = User::findOrFail(Auth::id());
        // Verify user owns the event
        if ($event->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $user = User::findOrFail(Auth::id());
        // Verify user owns the event
        if ($event->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image update if needed
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image_path) {
                Storage::disk('public')->delete('images/' . $event->image_path);
            }
            
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->storeAs('images', $filename, 'public');
            $event->image_path = $filename;
        }

        // Update other fields
        $event->update([
            'title' => $request->title,
            'location' => $request->location,
            'description' => $request->description,
            'date' => $request->date,
            // Add other fields as needed
        ]);

        return redirect()->route('event-detail', $event)->with('success', 'Event updated successfully!');
    }
}
