<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve</title>
    <link rel="stylesheet" href="{{ asset('css/page/create-event.css') }}">
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
                    <section id="create-event">
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-container">
                                <div class="left">
                                    <div class="input-container">
                                        <label for="image">Upload Image:</label>
                                        <input type="file" id="image" name="image" accept="image/*">
                                        <img id="image-preview" src="#" alt="Preview"/>
                                    </div>
                                    <div class="input-container">
                                        <div class="sub-container">
                                            <input type="text" name="title" placeholder="Event Name" required>
                                            <img src="{{ asset('assets/icons/pencil.png') }}" alt="pencil icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="input-container">
                                        <label for="location">Location:</label>
                                        <div class="sub-container">
                                            <input type="text" id="location" name="location" placeholder="Location" required>
                                            <img src="{{ asset('assets/icons/pencil.png') }}" alt="pencil icon">
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label for="date">Date:</label>
                                        <div class="sub-container">
                                            <input type="date" id="date" name="date" required>
                                        </div>
                                    </div>
                                    <div class="input-container">
                                        <label for="description">Description:</label>
                                        <div class="sub-container">
                                            <input type="text" id="description" name="description" placeholder="Description" required>
                                            <img src="{{ asset('assets/icons/pencil.png') }}" alt="pencil icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="create-btn-container">
                                <button class="create-btn" type="submit">Create</button>
                            </div>
                        </form>
                        @if (session('success'))
                            <div class="notification-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/image-preview.js') }}"></script>
</body>
</html>
