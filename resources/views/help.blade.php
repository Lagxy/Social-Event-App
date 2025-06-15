<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve</title>
    <link rel="stylesheet" href="{{ asset('css/page/help.css') }}">
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
                    <section id="help">
                        <h2>Help Resources</h2>
                        <ul class="help-list" role="list">
                            <li>
                                <button>
                                    <p>How to create an Account?</p>
                                    <img
                                        class="icon"
                                        src="../assets/icons/arrow.png"
                                        alt="arrow icon"
                                    />
                                </button>
                            </li>
                            <li>
                                <button>
                                    <p>How to join an event?</p>
                                    <img
                                        class="icon"
                                        src="../assets/icons/arrow.png"
                                        alt="arrow icon"
                                    />
                                </button>
                            </li>
                            <li>
                                <button>
                                    <p>How to create an event?</p>
                                    <img
                                        class="icon"
                                        src="../assets/icons/arrow.png"
                                        alt="arrow icon"
                                    />
                                </button>
                            </li>
                        </ul>
                    </section>

                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
