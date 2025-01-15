@php use Illuminate\Support\Facades\URL; @endphp
<nav x-data="{ currentUrl: '{{ URL::current() }}'}" class="flex flex-col justify-start flex-shrink-0
overflow-y-auto md:block">
    <h2 class="sr-only">Navigation</h2>
    <div class="flex flex-col justify-start items-center flex-shrink-0 min-h-screen max-h-screen gap-6">
        <a class="mt-8" href="{{ route('dashboard') }}">
            <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="max-h-fit max-w-fit w-36">
        </a>
        <ul class=" flex flex-col justify-center gap-3">
            <livewire:navigations.nav-item icon="home" url="/dashboard" slot="Tableau de bord"/>
            <livewire:navigations.nav-item icon="bank" url="/funds/" slot="Fonds"/>
         {{--               <livewire:navigations.nav-item icon="meeting" url="/meetings" slot="Réunion"/>--}}
                        <livewire:navigations.nav-item icon="calendar" url="/calendar" slot="Calendrier"/>
            <livewire:navigations.nav-item icon="detente" url="/detente" slot="Détente"/>
            {{--      <livewire:navigations.nav-item icon="newsletter" url="/newsletter" slot="Newsletter">
                  <livewire:navigations.nav-item icon="user" url="/users"/ slot="Users">--}}
            <livewire:navigations.nav-item icon="user" url="/profile" slot="Profil"/>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <x-button.button icon="logout" class="w-full button-nav">Se déconnecter</x-button.button>
                </form>
            </li>
        </ul>
    </div>
</nav>



