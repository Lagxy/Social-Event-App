<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Event History</title>
    <link rel="stylesheet" href="{{ asset('css/page/history.css') }}">
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
                    <section id="history">
                        @forelse($events as $event)
                        @php
                            $participation = $event->participants->where('user_id', Auth::id())->first();
                        @endphp
                        <div class="event-history">
                            <div class="event-thumbnail">
                                @if($event->image_path)
                                    <img src="{{ asset('storage/images/' . $event->image_path) }}" alt="event thumbnail">
                                @else
                                    <img src="{{ asset('images/default-event.jpg') }}" alt="event thumbnail">
                                @endif
                            </div>
                            <div class="history-detail">
                                <div class="history-detail-item">
                                    <h3>{{ $event->title }}</h3>
                                    <p>by {{ $event->user->name }}</p>
                                    <span class="status-badge {{ $participation->status }}">
                                        {{ ucfirst($participation->status) }}
                                    </span>
                                </div>
                                <div class="history-detail-item">
                                    <h3>Location</h3>
                                    <p>{{ $event->location }}</p>
                                </div>
                                <div class="history-detail-item">
                                    <h3>Date</h3>
                                    <p>{{ $event->date->format('j M Y') }} at {{ date('g:i A', strtotime($event->time)) }}</p>
                                </div>
                                <div class="history-detail-item">
                                    <h3>Status</h3>
                                    <p>{{ $event->status}}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="no-events">
                            <p>You haven't joined any events yet.</p>
                        </div>
                        @endforelse
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>