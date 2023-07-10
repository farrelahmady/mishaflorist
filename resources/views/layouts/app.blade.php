<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('logo.ico') }}">

    <title>@yield('title') - {{ config('app.name') }}</title>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @livewireStyles

</head>

<body>


    @yield('content')

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>

    <x-livewire-alert::flash />
</body>

</html>
