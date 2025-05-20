<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/event-detail', function () {
    return view('event-detail');
})->name('event-detail'); // need to send value

Route::get('/history', function () {
    return view('history');
})->name('history');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/help', function () {
    return view('help');
})->name('help');
