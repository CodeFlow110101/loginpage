<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function Livewire\Volt\{state, rules, mount};

state(['email' => '', 'password' => '']);
rules(['email' => 'required|email|exists:users', 'password' => 'required|min:6']);

$signIn = function (Request $request) {
    $this->validate();
    if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        $request->session()->regenerate();
        session()->flash('showLoginSuccessToastr', 'Sign Successful.');
        $this->redirectRoute('dashboard', navigate: true);
    } else {
        $this->js("showToastr('error','Invalid Credentials')");
    }
};
?>

<div class="w-1/2 max-lg:w-4/5">
    <form wire:submit.prevent="signIn" class="grid grid-cols-1 gap-4">
        <div class="font-bold text-gray-600 text-2xl">Sign In</div>
        <div class="text-gray-600 font-normal">Enter your email and password to sign in</div>
        <div><input wire:loading.class="pointer-events-none" wire:model="email"
                class="p-3 border @error('email') border-red-600 bg-red-600 bg-opacity-10 @else border-gray-400 @enderror border-opacity-70 outline-none font-normal text-gray-600 rounded-lg w-full"
                placeholder="Email">
            @error('email')
                <span class="error text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div><input wire:loading.class="pointer-events-none" wire:model="password" type="password"
                class="p-3 border @error('password') border-red-600 bg-red-600 bg-opacity-10 @else border-gray-400 @enderror border-opacity-70 outline-none font-normal text-gray-600 rounded-lg w-full"
                placeholder="Password">
            @error('password')
                <span class="error text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full
                flex justify-between">
            <div class="w-min flex justify-between gap-2">
                <div class="flex justify-center items-center">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gradient-to-r peer-checked:from-cyan-400 peer-checked:to-emerald-400">
                        </div>
                    </label>
                </div>
                <div class="flex justify-center items-center whitespace-nowrap text-sm text-gray-700 tracking-wide">
                    Remember Me</div>
            </div>
            <div class="w-full"></div>
        </div>
        <div>
            <button wire:loading.class="py-3 cursor-wait pointer-events-none"
                class="p-4 bg-gradient-to-r flex justify-center items-center from-cyan-400 to-emerald-400 rounded-lg w-full text-white tracking-tighter font-bold">
                <div wire:loading.remove>Sign
                    In</div>
                <div wire:loading role="status">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-300 animate-spin fill-white" viewBox="0 0 100 101"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>
                <button>
        </div>
        <div class="flex justify-center">
            <div class="flex justify-between w-min whitespace-nowrap gap-2">
                <div>Don't have an account?</div>
                <div class="text-emerald-400">Sign up</div>
            </div>
        </div>
    </form>
</div>
