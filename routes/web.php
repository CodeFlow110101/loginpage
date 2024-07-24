<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect('/login');
});
Volt::route('/login', 'login-landing-page')->name('login');
Volt::route('/dashboard', 'logged-in-landing-page')->name('dashboard');
