<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts / Scripts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="icon" href="{{URL('/images/favicon-96x96.png')}}">
    <script src="{{ mix('js/app.js') }}"></script>
    @vite('resources/css/app.css')
</head>
<body class="main-template flex">
<header class="sidebar w-64 bg-slate-50">
    <div class="nav-background p-4 nav-box-shadow flex flex-col items-center">
        <livewire:navigations.navigation-bar/>
    </div>
</header>

<main class="relative flex flex-col p-8 w-full main-content">
    {{ $slot }}
</main>
</body>
</html>
