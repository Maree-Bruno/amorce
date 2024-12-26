<div x-data="{
'showLittleModal': false,
'showCreateDonation' : false,
'showCreateDonations' : false,
'showCreateSpent' :false,
'showCreateTransfer' : false,
}">
    <div class="flex justify-between items-center w-11/12">
        <h2 class="text-black text-5xl font-bold p-2.5">Fonds</h2>
        <div class="relative">
            <x-button.secondary-button class="buttons-confirm shadow-md" icon="plus" @click="showLittleModal = true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal class="left-[calc(50%-100px)] w-[300px]" x-show="showLittleModal">
                <div class="flex flex-col gap-2">
                    <x-button.secondary-button
                        class="button-nav"
                        @click="showCreateDonation = true"
                    >
                        Un don
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav"
                        @click="showCreateDonations = true"
                    >
                        Plusieurs dons
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav"
                        @click="showCreateSpent = true"
                    >
                        Une dépense
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav"
                        @click="showCreateTransfer = true"
                    >
                        Un transfert
                    </x-button.secondary-button>
                </div>
            </x-modals.little-modal>
        </div>
    </div>
    <livewire:fund-table :fund="$fund" name="fund-table" />
    <div>
        <div x-show="showCreateDonation" x-cloak>
            <livewire:bank-create-donation/>
        </div>
        <div x-show="showCreateDonations" x-cloak>
            <livewire:bank-add-multiple-donation/>
        </div>
        <div x-show="showCreateSpent" x-cloak>
            <livewire:bank-expenses/>
        </div>
        <div x-show="showCreateTransfer" x-cloak>
            <livewire:bank-transfert/>
        </div>
    </div>

</div>
