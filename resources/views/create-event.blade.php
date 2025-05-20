<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SE Project</title>
    <link rel="stylesheet" href="{{ asset('css/page/..............................css') }}">
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
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
