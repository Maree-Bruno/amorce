<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>L'amorce</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @vite('resources/css/app.css')

</head>
<body class="grid grid-cols-[auto,1fr] gap-5 h-screen">
<header class="w-max">
    <div class="nav-background max-w-52 max-h-screen  p-8 bg- rounded-tr-3xl rounded-br-3xl  nav-box-shadow flex-col
    justify-center items-center inline-flex">
        <x-navigations.navigation/>
    </div>
</header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
    </body>
</html>
