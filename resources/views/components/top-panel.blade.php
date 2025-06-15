<div id="top-panel">
    @auth
    <a href="/settings">
            <img class="profile-picture"
                 src="{{ asset('storage/profile-pictures/' . (Auth::user()->image_path ?? 'profile.png')) }}"
                 alt="profile icon">
    </a>
    @else
    <a href="/login">
        <img class="profile-picture" src="{{ asset('assets/icons/profile.png') }}" alt="profile icon">
    </a>
    @endauth
    <h1>{{ strtoupper(Route::currentRouteName()) }}</h1>
    <img class="logo" src="{{ asset('assets/icons/SocialEveLogo-removebg-preview.png') }}" alt="app logo">
</div>