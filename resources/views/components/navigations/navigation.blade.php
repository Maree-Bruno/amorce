@php use Illuminate\Support\Facades\URL; @endphp
<nav class="flex flex-col justify-start  flex-shrink-0 min-h-screen max-h-screen">
    <h2 class="sr-only"></h2>
    <div class="flex flex-col justify-start  flex-shrink-0 min-h-screen max-h-screen gap-9">
        <a class="mt-8 max-w-max" href="/">
            <img src="{{URL('images/logo.png')}}" alt="Logo de l'amorce" class="">
        </a>
        <ul class=" flex flex-col items-center justify-start gap-9">
            <x-navigations.nav-item>Home</x-navigations.nav-item>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <x-button.button>{{__('Logout')}}</x-button.button>
                </form>
            </li>
        </ul>
    </div>
</nav>
