<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="icon" href="{{URL('/images/favicon-96x96.png')}}">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')

</head>
<body class="grid grid-cols-[auto,1fr] h-screen">
<h1 class="sr-only">{{ config('app.name') }}</h1>
<header class="w-fit">
    <div class="nav-background max-w-lg min-w-64 max-h-screen p-4 nav-box-shadow flex-col
    justify-center items-center inline-flex">
        <x-navigations.navigation-bar/>
    </div>
</header>
<main class="relative flex flex-col gap-4 p-8">
    {{ $slot }}
</main>
</body>
</html>
