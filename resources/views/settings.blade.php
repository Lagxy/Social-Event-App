<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SE Project</title>
    <link rel="stylesheet" href="{{ asset('css/page/settings.css') }}">
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
                    <section id="settings">
                        <div class="account-settings">
                            <h2>Account</h2>
                            <ul class="account-settings-list" role="list">
                                <li>
                                    <button>
                                        <p>Change profile picture</p>
                                        <img
                                            class="icon"
                                            src="../assets/icons/morethan.png"
                                            alt="morethan icon"
                                        />
                                    </button>
                                </li>
                                <li>
                                    <button>
                                        <p>Change password</p>
                                        <img
                                            class="icon"
                                            src="../assets/icons/morethan.png"
                                            alt="morethan icon"
                                        />
                                    </button>
                                </li>
                                <li>
                                    <button>
                                        <p>Change phone number</p>
                                        <img
                                            class="icon"
                                            src="../assets/icons/morethan.png"
                                            alt="morethan icon"
                                        />
                                    </button>
                                </li>
                                <li>
                                    <button>
                                        <p>Change email address</p>
                                        <img
                                            class="icon"
                                            src="../assets/icons/morethan.png"
                                            alt="morethan icon"
                                        />
                                    </button>
                                </li>
                                <li>
                                    <button>
                                        <p>Delete account</p>
                                    </button>
                                </li>
                            </ul>
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
