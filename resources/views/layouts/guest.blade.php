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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="background-color flex justify-center items-center flex-col">
<div class="flex justify-center items-center">
    <figure class="mt-8 max-w-max" href="">
        <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="h-[182px]">
    </figure>
</div>
<div class=" w-1/3 bg-white p-10 rounded-2xl h-[50vh] flex flex-col justify-center items-center modal-box-shadow">
    <form action="{{route('login')}}" method="post" class="w-full flex flex-col gap-12">
        @csrf
        <div class="flex flex-col ">
            <x-form.input-label for="email" class="">Email</x-form.input-label>
            <input type="email" name="email" id="email" placeholder="example@example.com" class="rounded-lg">
        </div>
        <div class="flex flex-col">
            <x-form.input-label for="password" class="">Mot de passe</x-form.input-label>
            <input type="password" name="password" id="password" placeholder="PassW0rd8!" class="rounded-lg">
        </div>
        <div class="flex flex-row justify-between">
            <a href="/" class="underline place-self-center">Mot de passe oublié ?</a>
            <x-button.button class="buttons-confirm place-self-center">Se connecter</x-button.button>
        </div>
    </form>
</div>


</body>
</html>
