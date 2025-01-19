<nav class="inline-flex items-center w-full gap-12"
     x-data="{
'showCreateFund' : false,
'showEditFund' : false,
'showDeleteFund' : false
}">
    <div class="w-full flex flex-row justify-between">
        <h4 class="sr-only">Navigation des fonds</h4>
        <div class="whitespace-nowrap overflow-x-scroll scroll-m-1 scroll-p-1 overscroll-x-contain">
            <ul class="inline-flex gap-2">
                @foreach($funds as $fund)
                    <livewire:navigations.fund-nav-item
                        url="{{ route('fund.index', ['fund' => $fund->id]) }}"
                        class="inline-block sm:block" slot="{{$fund->name}}"/>
                @endforeach
            </ul>
        </div>
        <div class="relative ml-auto" x-data="{ 'showLittleModal': false }" @keydown.escape="showLittleModal = false">
            <x-button.secondary-button icon="more" class="buttons" @click="showLittleModal = true" :responsive="true">
                Plus
            </x-button.secondary-button>
            <x-modals.little-modal class="right-0" x-show="showLittleModal">
                <x-button.secondary-button icon="plus" @click="showCreateFund = true">
                    Ajouter
                </x-button.secondary-button>
                <x-button.secondary-button icon="edit" @click="showEditFund = true">
                    Éditer
                </x-button.secondary-button>
                <x-button.secondary-button icon="minus" @click="showDeleteFund = true">
                    Supprimer
                </x-button.secondary-button>
            </x-modals.little-modal>
        </div>

    </div>
    <div>
        <div x-show="showCreateFund" x-cloak>
            <livewire:funds.create-fund/>
        </div>
        <div x-show="showEditFund" x-cloak>
            <livewire:funds.edit-fund/>
        </div>
        <div x-show="showDeleteFund" x-cloak>
            <livewire:funds.delete-fund/>
        </div>
    </div>
</nav>
