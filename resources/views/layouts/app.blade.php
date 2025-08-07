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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="main-template flex max-width">
<h1 class="sr-only">{{ config('app.name') }}</h1>
<header class="sidebar w-10 bg-slate-50 md:min-w-52">
    <div class="nav-background p-2 nav-box-shadow flex flex-col items-center xl:p-4">
        <livewire:navigations.navigation-bar/>
    </div>
</header>

<main class="relative flex flex-col p-4 flex-1 main-content xl:p-8 xl:w-full">
    <div class="flex items-center justify-end mb-2">
        <a href="/profile" class="text-black text-sm rounded-xl nav_item_hover flex items-center justify-center gap-2
        md:text-lg">
            <img src="{{ asset(Auth::user()->image) }}" alt="Photo de profil de {{ Auth::user()->name }}" class="max-w-6 md:max-w-8 rounded-lg">
            <p>
                {{Auth::user()->name}}
            </p>
        </a>
    </div>
    {{ $slot }}
</main>
</body>
</html>
