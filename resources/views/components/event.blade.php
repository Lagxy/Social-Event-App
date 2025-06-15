@props(['event'])

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $hasJoined = $user 
        ? \App\Models\Participant::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists()
        : false;
@endphp

<div class="event-card">
    <div class="event-thumbnail">
        <img src="{{ asset('storage/images/' . ($event->image_path ?? 'default-image.jpg')) }}" alt="Event thumbnail" />
    </div>
    <div class="event-title">
        <h3>{{ $event->title }}</h3>
        <p>by {{ $event->user->name ?? 'Unknown' }}</p>
    </div>
    <div class="event-interaction">
        @auth
            @if ($hasJoined)
                <span class="joined-label">Joined</span>
            @else
                <form method="POST" action="{{ route('event.join', $event->id) }}">
                    @csrf
                    <button type="submit" class="join-btn">Join</button>
                </form>
            @endif
        @else
            <a href="{{ route('login') }}" class="join-btn">Join</a>
        @endauth

        <a class="detail-btn" href="{{ url('/event-detail/' . $event->id) }}">Detail</a>
    </div>
</div>
