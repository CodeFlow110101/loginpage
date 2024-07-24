<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Page Title' }}</title>
    <script src="{{ asset('js/alpine.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body
    style="@if (true) background-image: url('{{ asset('images/loggedinpagebackground.png') }}');background-size: cover;background-repeat: no-repeat;background-position: top; @endif">
    {{ $slot }}
    <div id="toastr"
        class="fixed top-3 right-3 px-4 py-5 rounded-lg w-80 transition-transform scale-x-0 duration-500 text-white font-semibold text-lg origin-right flex justify-between items-center gap-4">
    </div>
    <div class="hidden bg-green-600 bg-red-600"></div>
</body>

</html>
