<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;

Route::redirect('/', '/home');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Event Routes
Route::middleware('auth')->group(function () {
    // Event creation and management
    Route::get('/create-event', function () {
        return view('create-event');
    })->name('create-event');
    
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/event-detail/{event}', [EventController::class, 'show'])->name('event-detail');

    // Participant Routes
    Route::post('/event/{event}/join', [ParticipantController::class, 'join'])->name('event.join');
    Route::post('/event/{event}/cancel', [ParticipantController::class, 'cancel'])->name('event.cancel');
    
    // History Route - now points to the controller
    Route::get('/history', [ParticipantController::class, 'history'])->name('history');
});

Route::middleware('auth')->group(function () {
    // Edit event route
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});

Route::middleware('auth')->group(function () {
    Route::put('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update-picture');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::put('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.update-email');
});

Route::get('/help', function () {
    return view('help');
})->name('help');