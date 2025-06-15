<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve</title>
    <link rel="stylesheet" href="{{ asset('css/page/home.css') }}">
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
                    <section id="home">
                        @foreach ($events as $event)
                            <x-event :event="$event" />
                        @endforeach
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
