<?php

use function Livewire\Volt\{state, layout, mount};

layout('components.layouts.app');

mount(function () {
    if (Auth::check()) {
        $this->redirectRoute('dashboard', navigate: true);
    }
});
?>

<div class="lg:flex bg-white lg:justify-between lg:gap-10 h-dvh">
    <div class="w-1/2 max-lg:w-full h-full flex justify-center items-center">
        @if (request()->route()->getName() == 'login')
            <livewire:login-page />
        @endif
    </div>
    <div class="w-1/2 max-lg:hidden h-full p-4">
        <div class=" relative h-full bg-green-200 rounded-xl"
            style="background-image: url('{{ asset('images/signinpageimage.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: top;">
            <div class="w-full rounded-xl h-full bg-gradient-to-r from-cyan-400 to-emerald-400 opacity-60">
            </div>
            <div class="absolute inset-0 m-auto w-max h-16 flex justify-center items-center">
                <div class="grid grid-cols-1 gap-2.5 whitespace-nowrap mt-10 text-white tracking-wide">
                    <div class="text-center text-2xl font-bold">"Attention is the new currency"</div>
                    <div class="grid grid-cols-1 gpa-2">
                        <div class="text-center">The more effortless the writing looks, the more effort the writer</div>
                        <div class="text-center">actually put into the process.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
