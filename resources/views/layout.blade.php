<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SE Project</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="layout-wrapper">
    <header>
        <nav>
            <div class="hamburger-icon">
                <button>
                    <img class="icon-btn" src="..\assets\icons\hamburger.png" alt="hamburger icon">
                </button>
            </div>
            <ul role="list">
                <li>
                    <button onclick="loadPage('home')">
                        <img class="icon" src="../assets/icons/home.png" alt="home icon">
                        <p>Home</p>
                    </button>
                </li>
                <li>
                    <button onclick="loadPage('history')">
                        <img class="icon" src="../assets/icons/history.png" alt="history icon">
                        <p>History</p>
                    </button>
                </li>
                <li>
                    <button onclick="loadPage('settings')">
                        <img class="icon" src="../assets/icons/gear.png" alt="gear icon">
                        <p>Settings</p>
                    </button>
                </li>
                <li>
                    <button onclick="loadPage('help')">
                        <img class="icon" src="../assets/icons/questionmark.png" alt="questionmark icon">
                        <p>Help</p>
                    </button>
                </li>
            </ul>
            <ul role="list">
                <h3>Events</h3>
                <li>
                    <button onclick="loadPage('create event')">
                        <img class="icon" src="../assets/icons/calendar.png" alt="calendar icon">
                        <p>Create Event</p>
                    </button>
                </li>
                <li>
                    <button onclick="loadPage('hosted')">
                        <img class="icon" src="../assets/icons/calendar.png" alt="calendar icon">
                        <p>Hosted</p>
                    </button>
                </li>
                <li>
                    <button onclick="loadPage('manage')">
                        <img class="icon" src="../assets/icons/edit.png" alt="pencil icon">
                        <p>Manage</p>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="top-panel">
            <button onclick="loadPage('login')">
                <img class="logo" src="../assets/icons/profile.png" alt="profile icon">
            </button>
            <h1>Lorem</h1>
            <img class="logo" src="../assets/icons/app-logo.png" alt="app logo">
        </div>
        <div class="app-outer">
            <div id="app">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </main>
    </div>
    
    <footer>
        <p>©2025 SE Kelompok 8</p>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
