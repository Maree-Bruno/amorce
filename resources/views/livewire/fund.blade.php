<div>
    <div class="flex justify-between items-center w-11/12" x-data="{ 'showModal': false, 'showCreate' : false}">
        <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Fonds</h2>
{{--        <div class="relative">
            <x-button.secondary-button class="buttons-confirm shadow-md" icon="plus" @click="showModal = true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal class="left-[calc(50%-100px)] w-[300px] ">
                <ul class="flex flex-col gap-2">
                    <livewire:navigations.nav-item url="/transactions/create/donation" slot="Un don"/>
                    <livewire:navigations.nav-item url="/transactions/create/donations" slot="Plusieurs dons"/>
                    <livewire:navigations.nav-item url="/transactions/create/spent" slot="Une dépense"/>
                    <livewire:navigations.nav-item url="/transactions/create/transfer" slot="Un transfert"/>
                </ul>
            </x-modals.little-modal>
        </div>--}}
        <div class="flex flex-row gap-2.5">
            <a>Un don</a>
        </div>
    </div>
    <livewire:bank-create-donation/>
    <livewire:fund-table :$fund/>
</div>
