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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @livewireStyles

</head>

<body>
    <div id="flash-container" class="fixed z-[9999] flex flex-col left-4 right-4 top-4">

    </div>

    @yield('content')

    @livewireScripts
    @stack('scripts')

    @vite('resources/js/flash.js')
</body>

</html>
