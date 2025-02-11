<div class="flex flex-col flex-1" x-data="{
'showLittleModal': false,
'showCreateDonation' : false,
'showCreateDonations' : false,
'showCreateSpent' :false,
'showCreateTransfer' : false,
}">
    <div class="flex items-center gap-10 xl:justify-between">
        <h2 class="text-black text-3xl font-bold p-2.5 xl:text-5xl">Fonds</h2>
        <div class="mr-auto">
            <x-button.secondary-button :responsive="true" class="buttons-confirm shadow-md relative" icon="plus"
                                       @click="showLittleModal =
            true">
                Ajouter
            </x-button.secondary-button>
            <x-modals.little-modal x-show="showLittleModal">
                <div class="flex flex-col gap-2 items-start">
                    <x-button.secondary-button
                        class="button-nav justify-start"
                        @click="showCreateDonation = true"
                    >
                        Un don
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav justify-start"
                        @click="showCreateDonations = true"
                    >
                        Plusieurs dons
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav justify-start"
                        @click="showCreateSpent = true"
                    >
                        Une dépense
                    </x-button.secondary-button>
                    <x-button.secondary-button
                        class="button-nav justify-start"
                        @click="showCreateTransfer = true"
                    >
                        Un transfert
                    </x-button.secondary-button>
                </div>
            </x-modals.little-modal>
        </div>
    </div>
    <livewire:fund-table :fund="$fund" name="fund-table"/>
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
