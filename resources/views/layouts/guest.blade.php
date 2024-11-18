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
<div class=" w-1/3 bg-white p-10 rounded-2xl flex flex-col items-center modal-box-shadow ">
    <form action="{{route('login')}}" method="post" class="w-full flex flex-col">
        @csrf
        <div class="flex flex-col mb-5">
            <x-form.input-label for="email" class="">Email</x-form.input-label>
            <input type="email" name="email" id="email" placeholder="example@example.com" class="rounded-lg box-focus">
            @error('email')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <x-form.input-label for="password" class="">Mot de passe</x-form.input-label>
            <input type="password" name="password" id="password" placeholder="PassW0rd8!" class="rounded-lg box-focus">
            @error('password')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="block mb-2">
            <label for="remember_me" class="inline-flex items-center box-focus focus:outline-none">
                <input id="remember_me" type="checkbox"
                       class="rounded focus:outline-none checkbox"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Se souvenir de moi</span>
            </label>
        </div>
            <div class="flex flex-row justify-between">
                <a href="/" class="underline place-self-center box-focus">Mot de passe oublié ?</a>
                <x-button.button class="buttons-confirm place-self-center box-focus">Se connecter</x-button.button>
            </div>
    </form>
</div>


</body>
</html>
