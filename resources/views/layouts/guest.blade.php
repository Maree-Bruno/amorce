<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="icon" href="{{URL('/images/favicon-96x96.png')}}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="background-color flex justify-center items-center flex-col">
<div class="flex justify-center items-center">
    <figure class="mt-8">
        <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="lg:h-52 w-auto h-30">
    </figure>
</div>
<div class=" w-9/12 bg-white p-8 rounded-2xl flex flex-col items-center modal-box-shadow lg:w-1/3">
    {{$slot}}
</div>


</body>
</html>
