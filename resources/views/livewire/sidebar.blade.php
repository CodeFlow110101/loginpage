<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use function Livewire\Volt\{mount, state};

state(['user']);

$redirectTo = function ($path) {
    $this->redirectRoute($path, navigate: true);
};

$signOut = function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $this->redirectRoute('login', navigate: true);
};

mount(function () {
    $this->user = Auth::user();
});
?>

<div :class="toggleSidebar ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-72'"
    class="w-full max-lg:transition-transform max-lg:duration-300 flex justify-center items-center rounded-2xl bg-white">
    <div class="grid grid-cols-1 gap-4 w-full w-4/5 px-6 my-12">
        <div wire:click="redirectTo('dashboard')" class="flex justify-between gap-2 p-4 rounded-lg hover:bg-gray-200">
            <div class="w-min">
                <svg class="w-6 h-6 text-indigo-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z" />
                </svg>
            </div>
            <div class="w-full text-gray-800">Dashboard</div>
        </div>
        <div wire:click="redirectTo('posts')" class="flex justify-between gap-2 p-4 rounded-lg hover:bg-gray-200">
            <div class="w-min">
                <svg class="w-6 h-6 text-orange-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                </svg>
            </div>
            <div class="w-full text-gray-800">Posts</div>
        </div>
        <div wire:click="signOut" class="flex justify-between gap-2 p-4 rounded-lg hover:bg-gray-200">
            <div class="w-min">
                <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                </svg>

            </div>
            <div class="w-full text-gray-800">Sign Out</div>
        </div>
        <div class="flex justify-center mt-4">
            <div class="grid grid-cols-1 gap-2 text-center">
                <div class="flex justify-center">
                    <svg class="w-12 h-12 text-emerald-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="font-semibold">{{$user->name}}</div>
            </div>
        </div>
    </div>
</div>