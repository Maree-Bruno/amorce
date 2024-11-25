<x-guest-layout>
    <form class="w-full flex flex-col" action="{{route('login')}}" method="post" >
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
</x-guest-layout>
