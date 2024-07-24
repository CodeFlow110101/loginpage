<?php
use Illuminate\Http\Request;
use function Livewire\Volt\{layout, mount};
layout('components.layouts.app');

mount(function (Request $request) {
    if (!Auth::check()) {
        $this->redirectRoute('login', navigate: true);
    }

    if (session()->has('showLoginSuccessToastr')) {
        $this->js("showToastr('success','" . session()->get('showLoginSuccessToastr') . "')");
    }
});
?>

<div x-data="{ toggleSidebar: false }" class="p-6 flex lg:justify-between lg:gap-12 max-lg:justfy-center">
    <div class="fixed top-5 z-10 w-60 lg:w-1/5">
        <livewire:sidebar />
    </div>
    <div class="lg:w-1/5 w-min">
    </div>
    <div class="lg:w-4/5 w-full grid grid-cols-1 gap-10">
        <div class="lg:flex lg:justify-between max-lg:grid max-lg:grid-cols-1 max-lg:gap-4">
            <div>
                <div class="capitalize text-white w-min gap-2 flex tracking-tighter justify-between">
                    <div>Pages</div>
                    <div>/</div>
                    <div>{{ request()->route()->getName() }}</div>
                </div>
                <div class="capitalize text-white font-bold tracking-wide">{{ request()->route()->getName() }}</div>
            </div>
            <div class="flex justify-between items-center gap-3">
                <div class="relative">
                    <input class="p-3 max-lg:w-4/5 pl-10 text-sm rounded-lg bg-white outline-none"
                        placeholder="Type here...">
                    <svg class="w-5 h-5 absolute text-gray-500 top-3 left-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="3"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <button x-on:click="toggleSidebar = !toggleSidebar"
                    class="hover:bg-gray-100 hover:bg-opacity-20 rounded-full p-4 w-16 outline-none lg:hidden">
                    <div class="grid grid-cols-1 gap-2">
                        <div class="border-2 rounded-full border-white"></div>
                        <div class="border-2 h-0 rounded-full border-white"></div>
                        <div class="border-2 rounded-full border-white"></div>
                    </div>
                </button>
            </div>
        </div>
        <div>
            <livewire:dashboard />
        </div>
        <div class="text-gray-600">© {{ date('Y') }}
            , Created by CodeFlow All rights reserved</div>
    </div>
</div>
