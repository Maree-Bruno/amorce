<x-layout-guest>
    <form method="POST" action="{{ route('register') }}" class="w-full flex flex-col">
        @csrf
        <div class="flex flex-col mb-5">
            <x-form.input-label for="name" class="">Nom</x-form.input-label>
            <input type="text" name="name" id="name" placeholder="Joe Doe" class="rounded-lg box-focus">
            @error('name')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mb-5">
            <x-form.input-label for="email" class="">Email</x-form.input-label>
            <input type="email" name="email" id="email" placeholder="example@example.com" class="rounded-lg box-focus">
            @error('email')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col mb-6">
            <x-form.input-label for="password" class="">Mot de passe</x-form.input-label>
            <input type="password" name="password" id="password" placeholder="PassW0rd8!" class="rounded-lg box-focus">
            @error('password')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col lg:flex-row justify-between gap-2">
            <a href="{{ route('login') }}" class="underline place-self-center box-focus">Déja un compte ?</a>
            <x-button.button class="buttons-confirm place-self-center box-focus">S'inscrire</x-button.button>
        </div>
    </form>
</x-layout-guest>
