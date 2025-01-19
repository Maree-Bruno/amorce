@php use App\Models\User; @endphp
<x-app-layout>
    <h2 class=" text-black text-3xl font-bold p-2.5 xl:text-5xl">Bienvenue {{Auth::user()->name}}!</h2>
</x-app-layout>
