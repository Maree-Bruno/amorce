@php use App\View\Components\icon\bank; @endphp
<x-app-layout>
    <div class="flex justify-between" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Banque</h2>
        <x-button.secondary-button class="buttons-confirm relative" icon="plus" @click="showModal = true">Ajouter
        </x-button.secondary-button>
        <x-modals.little-modal class="">
            <ul>
                <x-navigations.nav-item>Un don</x-navigations.nav-item>
                <x-navigations.nav-item>Plusieurs dons</x-navigations.nav-item>
                <x-navigations.nav-item>Une dépense</x-navigations.nav-item>
                <x-navigations.nav-item>Un transfert</x-navigations.nav-item>
            </ul>
        </x-modals.little-modal>

    </div>
    <div class="w-3/5">
        <x-navigations.bank-nav/>
        <div class="inline-flex justify-between p-2.5 w-full mt-3">
            <span class="text-black text-3xl font-semibold font-['Inter'] leading-9">Solde du fond</span>
            <span class="text-black text-3xl font-semibold font-['Inter'] leading-9">12,000.30 €</span>
        </div>
        <table>
            <tbody>
            <tr>04/2024</tr>
            </tbody>
        </table>
        <table>
            <tbody>

            </tbody>
        </table>

    </div>
</x-app-layout>
