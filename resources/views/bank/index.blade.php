<x-app-layout>
    <div class="flex justify-between items-center w-11/12" x-data="{ 'showModal': false }" @keydown.escape="showModal =
    false">
        <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Banque</h2>
        <div class="relative">
            <x-button.secondary-button class="buttons-confirm" icon="plus" @click="showModal = true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal class="left-[calc(50%-100px)] w-[300px] ">
                <ul class="flex flex-col gap-2">
                    <x-navigations.nav-item href="">Un don</x-navigations.nav-item>
                    <x-navigations.nav-item>Plusieurs dons</x-navigations.nav-item>
                    <x-navigations.nav-item>Une dépense</x-navigations.nav-item>
                    <x-navigations.nav-item>Un transfert</x-navigations.nav-item>
                </ul>
            </x-modals.little-modal>
        </div>
    </div>
    <section class="flex flex-row gap-10">
        <h3 class="sr-only">Interface de la banque</h3>
        <div class="w-11/12 border-slate-200 border shadow-md rounded-2xl p-4">
            <livewire:fund-bar-nav/>
            <div class=" border-t border-slate-200 mt-4 mb-4"></div>
            <livewire:fund-table/>
        </div>
       {{-- <section class="w-1/4 flex flex-col p-6 border-slate-200 shadow-md border rounded-2xl">
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
        </section>--}}
    </section>
</x-app-layout>
