<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit {{ $event->title }} | SocialEve</title>
    <link rel="stylesheet" href="{{ asset('css/page/edit.css') }}">
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
                    <section id="edit">
                        <h1>Edit Event</h1>
                        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" value="{{ old('location', $event->location) }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" value="{{ old('date', $event->date->format('Y-m-d')) }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" id="time" name="time" value="{{ old('time', $event->time) }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" required>{{ old('description', $event->description) }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Event Image</label>
                                <input type="file" id="image" name="image">
                                
                                @if($event->image_path)
                                    <div class="current-image">
                                        <p>Current Image:</p>
                                        <img src="{{ asset('storage/images/' . $event->image_path) }}" alt="Current event image">
                                    </div>
                                @endif
                            </div>
                            
                            <button type="submit" class="submit-btn">Update Event</button>
                        </form>
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>