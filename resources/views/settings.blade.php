<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SocialEve</title>
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
                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <section id="settings">
                        <div class="account-settings">
                            <h2>Account</h2>
                            <ul class="account-settings-list" role="list">
                                <!-- Profile Picture -->
                                <li>
                                    <button class="settings-button" data-target="profile-picture-menu">
                                        <p>Change profile picture</p>
                                        <img class="icon" src="../assets/icons/morethan.png" alt="morethan icon"/>
                                    </button>
                                    <div id="profile-picture-menu" class="settings-menu" style="display: none;">
                                        <form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="file" name="profile_picture" accept="image/*" required>
                                            <button type="submit">Upload</button>
                                        </form>
                                    </div>
                                </li>
                                
                                <!-- Password -->
                                <li>
                                    <button class="settings-button" data-target="password-menu">
                                        <p>Change password</p>
                                        <img class="icon" src="../assets/icons/morethan.png" alt="morethan icon"/>
                                    </button>
                                    <div id="password-menu" class="settings-menu" style="display: none;">
                                        <form action="{{ route('password.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" required>
                                            </div>
                                            <div>
                                                <label>New Password</label>
                                                <input type="password" name="password" required>
                                            </div>
                                            <div>
                                                <label>Confirm Password</label>
                                                <input type="password" name="password_confirmation" required>
                                            </div>
                                            <button type="submit">Update Password</button>
                                        </form>
                                    </div>
                                </li>
                                
                                <!-- Email -->
                                <li>
                                    <button class="settings-button" data-target="email-menu">
                                        <p>Change email address</p>
                                        <img class="icon" src="../assets/icons/morethan.png" alt="morethan icon"/>
                                    </button>
                                    <div id="email-menu" class="settings-menu" style="display: none;">
                                        <form action="{{ route('profile.update-email') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label>Current Password</label>
                                                <input type="password" name="current_password" required>
                                            </div>
                                            <div>
                                                <label>New Email Address</label>
                                                <input type="email" name="email" required>
                                            </div>
                                            <button type="submit">Update Email</button>
                                        </form>
                                    </div>
                                </li>
                                
                                <!-- Logout -->
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <p>Log Out</p>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
    
    <x-footer/>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.settings-button');
            
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const targetMenu = document.getElementById(targetId);
                    
                    // Close all other menus first
                    document.querySelectorAll('.settings-menu').forEach(menu => {
                        if (menu.id !== targetId) {
                            menu.style.display = 'none';
                        }
                    });
                    
                    // Toggle current menu
                    if (targetMenu.style.display === 'none') {
                        targetMenu.style.display = 'block';
                    } else {
                        targetMenu.style.display = 'none';
                    }
                });
            });
            
            // Close menus when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.settings-button') && !e.target.closest('.settings-menu')) {
                    document.querySelectorAll('.settings-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                }
            });
        });
    </script>
</body>
</html>