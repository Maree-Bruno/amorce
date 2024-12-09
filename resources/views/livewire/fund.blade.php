<div>
    <div class="flex justify-between items-center w-11/12" x-data="{ 'showModal': false }" @keydown.escape="showModal =
    false">
        <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Fonds</h2>
        <div class="relative">
            <x-button.secondary-button class="buttons-confirm shadow-md" icon="plus" @click="showModal = true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal class="left-[calc(50%-100px)] w-[300px] ">
                <ul class="flex flex-col gap-2">
                    <x-navigations.nav-item url="/funds/create">Un don</x-navigations.nav-item>
                    <x-navigations.nav-item url="/funds/create">Plusieurs dons</x-navigations.nav-item>
                    <x-navigations.nav-item url="/funds/create">Une dépense</x-navigations.nav-item>
                    <x-navigations.nav-item url="/funds/create">Un transfert</x-navigations.nav-item>
                </ul>
            </x-modals.little-modal>
        </div>
    </div>
    <livewire:fund-table :$fund/>
</div>
