<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect('/login');
});
Volt::route('/login', 'login-landing-page')->name('login');
Volt::route('/sign-up', 'login-landing-page')->name('sign-up');
Volt::route('/dashboard', 'logged-in-landing-page')->name('dashboard');
Volt::route('/posts', 'logged-in-landing-page')->name('posts');
