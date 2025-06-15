<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve - Register</title>
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
                    <section id="register">
                        <form method="POST" action="{{ route('register') }}" autocomplete="off">
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
                                <label for="name">Username</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus />
                            </div>
                            
                            <div class="input-container">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required />
                            </div>

                            <div class="input-container">
                                <label for="dateofbirth">Date of Birth</label>
                                <input type="date" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth') }}" required />
                            </div>
                            
                            <div class="input-container">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required />
                            </div>
                            
                            <div class="input-container">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required />
                            </div>
                            
                            <button class="submit-btn" type="submit">Register</button>
                            
                            <p>OR</p>
                            
                            <a href="{{ route('login') }}" class="alternate-action">
                                Already Have an Account?
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