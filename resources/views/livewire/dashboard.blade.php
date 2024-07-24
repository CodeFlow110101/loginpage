<?php
use Illuminate\Support\Facades\Http;
use function Livewire\Volt\{state, mount};
?>

<div class="grid grid-cols-1 gap-6">
    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
        <div class="bg-white w-full h-32 rounded-2xl shadow-md"></div>
    </div>
    <div class="lg:flex lg:justify-between max-lg:grid max-lg:grid-cols-1 gap-6">
        <div class="bg-white lg:w-3/5 h-96 rounded-2xl shadow-md"></div>
        <div class="bg-white lg:w-2/5 h-96 rounded-2xl shadow-md"></div>
    </div>
    <div class="lg:flex lg:justify-between max-lg:grid max-lg:grid-cols-1 gap-6">
        <div class="bg-white lg:w-3/5 h-72 rounded-2xl shadow-md"></div>
        <div class="bg-white lg:w-2/5 h-72 rounded-2xl shadow-md"></div>
    </div>
</div>
