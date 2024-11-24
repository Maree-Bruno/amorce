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
    <section class="flex flex-row gap-12">
        <div class="w-3/5">
            <x-navigations.bank-nav/>
            <div class="inline-flex justify-between p-2.5 w-full mt-3">
                <span class="text-black text-3xl font-semibold font-['Inter'] leading-9">Solde du fond</span>
                <span class="text-black text-3xl font-semibold font-['Inter'] leading-9">12,000.30 €</span>
            </div>
            <div class="grid p-2.5">
                <div class="flex-col justify-start items-start gap-2.5 inline-flex">
                    <div class="self-stretch flex-col justify-start items-start flex">
                        <p class="self-stretch text-black text-base font-normal font-['Inter'] leading-snug">
                            04/2024
                        </p>
                        <div class="self-stretch justify-between items-center inline-flex">
                            <span class="text-black text-xl font-semibold font-['Inter'] leading-7">
                                Description
                            </span>
                            <div class="self-stretch justify-start items-center gap-6 flex">
                                <span class="text-right text-black text-xl font-semibold font-['Inter'] leading-7">
                                    + 200 €
                                </span>
                                <a href="#" class="nav_item_hover rounded">
                                    <span class="relative"><x-icon.more/></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 flex flex-col justify-center p-8">
            <div class="grid">
                <h3 class="text-black text-xl font-bold font-[Inter]">Derniers dons enregistrés</h3>
            </div>
        </div>
    </section>

</x-app-layout>
