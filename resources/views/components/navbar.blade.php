
     <nav class="main-nav">
            <div class="hamburger-icon">
                <button>
                    <img class="icon-btn" src="{{ asset('assets/icons/hamburger.png') }}" alt="hamburger icon">
                </button>
            </div>
            <ul role="list">
                <li>
                    <a href="/home">
                        <img class="icon" src="{{ asset('assets/icons/home.png') }}" alt="home icon">
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="/history">
                        <img class="icon" src="{{ asset('assets/icons/history.png') }}" alt="history icon">
                        <p>History</p>
                    </a>
                </li>
                <li>
                    <a href="/settings">
                        <img class="icon" src="{{ asset('assets/icons/gear.png') }}" alt="gear icon">
                        <p>Settings</p>
                    </a>
                </li>
                <li>
                    <a href="/help">
                        <img class="icon" src="{{ asset('assets/icons/questionmark.png') }}" alt="questionmark icon">
                        <p>Help</p>
                    </a>
                </li>
            </ul>
            <ul role="list">
                <h3>Events</h3>
                <li>
                    <a href="/create-event">
                        <img class="icon" src="{{ asset('assets/icons/calendar.png') }}" alt="calendar icon">
                        <p>Create Event</p>
                    </a>
                </li>
            </ul>
        </nav>
