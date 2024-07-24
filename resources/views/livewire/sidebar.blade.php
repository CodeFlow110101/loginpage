<?php
use Illuminate\Http\Request;
use function Livewire\Volt\{mount};

$signOut = function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $this->redirectRoute('login', navigate: true);
};
?>

<div :class="toggleSidebar ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-72'"
    class="w-full max-lg:transition-transform max-lg:duration-300 flex justify-center items-center rounded-2xl bg-white">
    <div class="grid grid-cols-1 gap-4 w-full w-4/5 px-6 my-12">
        <div class="flex justify-between gap-2 p-4 rounded-lg hover:bg-gray-200">
            <div class="w-min">
                <svg class="w-6 h-6 text-indigo-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z" />
                </svg>
            </div>
            <div class="w-full text-gray-800">Dashboard</div>
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
    </div>
</div>
