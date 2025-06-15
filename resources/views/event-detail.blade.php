<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }} | SocialEve</title>
    <link rel="stylesheet" href="{{ asset('css/page/event-detail.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        <header>
            <x-navbar/>
        </header>

        <main>
            <x-top-panel/>
            <div class="app-outer">
                <div id="app">
                    <section id="event-detail">
                        <div class="event-card">
                            <div class="event-thumbnail">
                                <img src="{{ asset('storage/images/' . ($event->image_path ?? 'images/default-event.jpg')) }}" alt="event thumbnail" />
                            </div>
                            <div class="event-title">
                                <h3>{{ $event->title }}</h3>
                                <p>by {{ $event->user->name ?? 'Unknown' }}</p>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-item">
                                <h2>Location</h2>
                                <p>{{ $event->location ?? 'Location not specified' }}</p>
                            </div>
                            <div class="detail-item">
                                <h2>Date</h2>
                                <p>
                                    @if($event->date)
                                        {{ $event->date->format('d M Y') }} @ {{ $event->time }}
                                    @else
                                        Date not specified
                                    @endif
                                </p>
                            </div>
                            <div class="detail-item">
                                <h2>Description</h2>
                                <p>
                                    {{ $event->description ?? 'No description available' }}
                                </p>
                            </div>
                            @auth
                                @if(auth()->id() === $event->user_id)
                                    <div class="event-actions">
                                        <a href="{{ route('events.edit', $event) }}" class="edit-btn">Edit Event</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        @auth
                        <div class="action-buttons">
                            @php
                                $participation = $event->participants->where('user_id', auth()->id())->first();
                            @endphp
                            
                            @if($participation->status == 'registered')
                                <form method="POST" action="{{ route('event.cancel', $event) }}">
                                    @csrf
                                    <button type="submit" class="cancel-btn">Cancel Participation</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('event.join', $event) }}">
                                    @csrf
                                    <button type="submit" class="join-btn">Join Event</button>
                                </form>
                            @endif
                            <div class="participation-status">
                                Status: <span class="status-badge {{ $participation->status }}">
                                    {{ ucfirst($participation->status) }}
                                </span>
                            </div>
                        </div>
                        @endauth
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>