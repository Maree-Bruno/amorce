@php use Illuminate\Support\Facades\URL; @endphp
<nav x-data="{ currentUrl: '{{ URL::current() }}' }" class="flex flex-col justify-start flex-shrink-0 min-h-full">
    <h2 class="sr-only">Navigation</h2>
    <div class="flex flex-col justify-start items-center flex-shrink-0 min-h-screen max-h-screen gap-6">
        <a class="mt-8" href="{{ route('dashboard') }}">
            <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="max-h-fit max-w-fit w-36">
        </a>
        <ul class=" flex flex-col justify-center gap-3">
            <x-navigations.nav-item icon="home" url="/dashboard" >Tableau de bord</x-navigations.nav-item>
            <x-navigations.nav-item icon="bank" url="/funds/" >Fonds</x-navigations.nav-item>
            {{--            <x-navigations.nav-item icon="meeting" url="/meetings" >Réunion</x-navigations.nav-item>
                        <x-navigations.nav-item icon="task" url="/task" >Tâches</x-navigations.nav-item>--}}
            <x-navigations.nav-item icon="detente" url="/detente" >Détente</x-navigations.nav-item>
            {{--      <x-navigations.nav-item icon="newsletter" url="/newsletter" >Newsletter</x-navigations.nav-item>
                  <x-navigations.nav-item icon="user" url="/users" >Users</x-navigations.nav-item>--}}
            <x-navigations.nav-item icon="user" url="/profile">Profil</x-navigations.nav-item>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <x-button.button icon="logout" class="w-full button-nav">Se déconnecter</x-button.button>
                </form>
            </li>
        </ul>
    </div>
</nav>


