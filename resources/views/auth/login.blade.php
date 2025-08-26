<x-layout-guest>
    <form class="w-full flex flex-col" action="{{route('login')}}" method="post">
        @csrf
        <div class="flex flex-col mb-5">
            <x-form.input-label for="email" class="text-sm xl:text-base 2xl:text-xl">Email</x-form.input-label>
            <input type="email" name="email" id="email" placeholder="example@example.com" class="rounded-lg box-focus
             text-xs xl:text-base 2xl:text-xl">
            @error('email')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mb-3">
            <x-form.input-label for="password" class="text-sm xl:text-base 2xl:text-xl">Mot de passe</x-form.input-label>
            <input type="password" name="password" id="password" placeholder="PassW0rd8!" class="rounded-lg box-focus
             text-xs xl:text-base 2xl:text-xl">
            @error('password')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="block mb-2">
            <label for="remember_me" class="inline-flex items-center box-focus focus:outline-none ">
                <input id="remember_me" type="checkbox"
                       class="rounded focus:outline-none checkbox"
                       name="remember">
                <span class="ms-2 text-xs text-gray-600 dark:text-gray-400 xl:text-base 2xl:text-xl">Se souvenir de
                    moi</span>
            </label>
        </div>
        <div class="flex flex-col lg:flex-row justify-between items-center gap-2">
            <a href="{{ route('password.request') }}" class="underline box-focus text-xs xl:text-base 2xl:text-xl">Mot
                de passe
                oublié ?</a>
            <x-button.button class="buttons-confirm box-focus">Se connecter</x-button.button>
        </div>
    </form>
</x-layout-guest>
