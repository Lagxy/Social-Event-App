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
                    <section id="event-detail">
                        <div class="event-card">
                            <div class="event-thumbnail">
                                <img src="" alt="event thumbnail" />
                            </div>
                            <div class="event-title">
                                <h3>Event name</h3>
                                <p>by [username]</p>
                            </div>
                            <div class="event-interaction">
                                <button class="join-btn">Join</button>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-item">
                                <h2>Location</h2>
                                <p>Rumah Juan</p>
                            </div>
                            <div class="detail-item">
                                <h2>Date</h2>
                                <p>32 Jan 1945</p>
                            </div>
                            <div class="detail-item">
                                <h2>Description</h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis
                                    at exercitationem perspiciatis eveniet mollitia ex voluptatum
                                    voluptates delectus labore, nisi dolores ea recusandae nesciunt.
                                    Molestiae laborum corrupti harum ipsum rem nostrum eaque
                                    deserunt laboriosam quaerat libero consequuntur atque, nisi
                                    possimus. Recusandae, doloribus inventore ea animi omnis in ad
                                    sed ducimus.
                                </p>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
