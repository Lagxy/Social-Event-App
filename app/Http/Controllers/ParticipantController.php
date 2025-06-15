<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function join(Event $event)
    {
        $user = Auth::user();

        // Check if user already has a participation record
        $existingParticipation = Participant::where('user_id', $user->id)
                                        ->where('event_id', $event->id)
                                        ->first();

        if ($existingParticipation) {
            if ($existingParticipation->status == 'cancelled') {
                // Update cancelled participation back to registered
                $existingParticipation->update([
                    'status' => 'registered',
                    'updated_at' => now()
                ]);
                return back()->with('message', 'Successfully rejoined the event!');
            } else {
                return back()->with('message', 'You already joined this event.');
            }
        }

        // Create new participation record
        Participant::create([
            'status' => 'registered',
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        return back()->with('message', 'Successfully joined the event!');
    }

    public function cancel(Event $event)
    {
        $participant = Participant::where('user_id', Auth::id())
                                ->where('event_id', $event->id)
                                ->firstOrFail();

        $participant->update(['status' => 'cancelled']);
        
        return back()->with('message', 'You have cancelled your participation.');
    }

    public function history()
    {
        $user = Auth::user();
        
        $events = Event::whereHas('participants', function($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->with('user') // Load the organizer
                    ->orderBy('date', 'desc')
                    ->get();

        return view('history', compact('events'));
    }
}
