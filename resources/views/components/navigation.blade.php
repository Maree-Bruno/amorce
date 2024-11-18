@php use Illuminate\Support\Facades\URL; @endphp
<nav class="flex flex-col justify-start  flex-shrink-0 min-h-screen max-h-screen">
    <h2 class="sr-only"></h2>
    <div class="flex flex-col justify-start  flex-shrink-0 min-h-screen max-h-screen gap-9">
        <a class="mt-8 max-w-max" href="/">
            <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="">
        </a>
        <ul class=" flex flex-col justify-center gap-9">
            <x-navigations.nav-item icon="home">Home</x-navigations.nav-item>
            <x-navigations.nav-item icon="bank">Banque</x-navigations.nav-item>
            <x-navigations.nav-item icon="meeting">Réunion</x-navigations.nav-item>
            <x-navigations.nav-item icon="task">Tâches</x-navigations.nav-item>
            <x-navigations.nav-item icon="detente">Détente</x-navigations.nav-item>
            <x-navigations.nav-item icon="newsletter">Newsletter</x-navigations.nav-item>
            <x-navigations.nav-item icon="user">Users</x-navigations.nav-item>
            <x-navigations.nav-item icon="settings">Paramètres</x-navigations.nav-item>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <x-button.button icon="logout" class="w-full button-nav">{{__('Logout')}}</x-button.button>
                </form>
            </li>
        </ul>
    </div>
</nav>
