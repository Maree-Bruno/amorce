@php use App\View\Components\icon\bank; @endphp
<x-app-layout>
    <div class="flex justify-between items-center" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Banque</h2>
        <div class="relative w-1/5">
            <x-button.secondary-button class="buttons-confirm" icon="plus" @click="showModal = true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal>
                <ul class="flex flex-col gap-2">
                    <x-navigations.nav-item>Un don</x-navigations.nav-item>
                    <x-navigations.nav-item>Plusieurs dons</x-navigations.nav-item>
                    <x-navigations.nav-item>Une dépense</x-navigations.nav-item>
                    <x-navigations.nav-item>Un transfert</x-navigations.nav-item>
                </ul>
            </x-modals.little-modal>
        </div>
    </div>
    <section class="flex flex-row gap-10">
        <h3 class="sr-only">Interface de la banque</h3>
        <div class="w-3/5 border-slate-200 border shadow-md rounded-2xl p-4">
            <x-navigations.bank-nav/>
            <section>
                <h4 class="sr-only">Derniers dons du fond</h4>
                <div class=" border-t border-slate-200 mt-4"></div>
                <div class="inline-flex justify-between p-2.5 w-full mt-3">
                    <span class="text-black text-3xl font-semibold font-['Inter']">Solde du fond</span>
                    <span class="text-black text-3xl font-semibold font-['Inter']">12,000.30 €</span>
                </div>
                <div class="flex flex-col gap-2 p-2.5">
                    <x-bank-item/>
                    <x-bank-item/>
                    <x-bank-item/>
                    <x-bank-item/>
                    <x-bank-item/>
                    <x-bank-item/>
                    <x-bank-item/>
                </div>
            </section>


        </div>
        <section class="w-1/4 flex flex-col p-6 border-slate-200 shadow-md border rounded-2xl">
            <h4 class="text-black text-xl font-bold font-[Inter] mb-2">Derniers dons enregistrés</h4>
            <div class="flex flex-col">
                <div class=" border-t border-slate-200 mt-4 mb-4"></div>
                <div class="flex flex-col gap-4">
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                    <x-last-bank-item/>
                </div>
            </div>
        </section>
    </section>

</x-app-layout>
