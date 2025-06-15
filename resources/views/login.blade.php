<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve - Login</title>
    <link rel="stylesheet" href="{{ asset('css/page/login-register.css') }}">
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
                    <section id="login">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            
                            @if ($errors->any())
                                <div class="error-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="input-container">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus />
                            </div>
                            
                            <div class="input-container">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required />
                            </div>
                            
                            <button type="button" class="forgot-password">Forgot Password?</button>
                            
                            <button class="submit-btn" type="submit">Login</button>
                            
                            <p>OR</p>
                            
                            <a href="{{ route('register') }}" class="alternate-action">
                                Create an Account!
                            </a>
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