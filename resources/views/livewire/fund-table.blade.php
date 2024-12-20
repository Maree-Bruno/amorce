<section class="flex flex-row gap-10 ">
    <h3 class="sr-only">Interface des fonds</h3>
    <div class="max-w-screen-xl w-11/12 border-slate-200 border shadow-md rounded-2xl p-4">
            <livewire:fund-bar-nav/>
        <div class=" border-t border-slate-200 mt-4 mb-4"></div>
        <div class="flex-col justify-start items-start inline-flex w-full">
            <div class="flex flex-row justify-between w-full pl-2 pr-2">
                <h4 class="font-semibold text-3xl font-[Inter]">Solde</h4>
                <span class="font-semibold text-3xl font-[Inter]">{{ number_format($total, 2) }}</span>
            </div>
            <div class=" border-b border-slate-200 mt-4 w-full "></div>
            <div class="flex-col justify-start items-start flex w-full">
                <div class="w-full">
                    <div class="grid grid-cols-3 items-center">
                        <x-button.filter-button icon="date" wire:click="sort('date')">
                            Date
                        </x-button.filter-button>
                        <x-button.filter-button icon="description" wire:click="sort('description')">
                            Description
                        </x-button.filter-button>
                        <x-button.filter-button icon="currency" wire:click="sort('amount')">
                            Montant
                        </x-button.filter-button>
                    </div>
                </div>
            </div>
            <div class=" border-b border-slate-200 mb-4 w-full "></div>
            <div class="flex-col justify-start items-start flex gap-2.5 w-full">
                @foreach($this->transactions as $transaction)
                    <div class="w-full" wire:key="{{$transaction->id}}">
                        <div class="grid grid-cols-3 items-center ">
                            <p class=" text-black text-base font-medium font-['Inter'] text-left pl-2.5 ">
                                {{$transaction->date->format('m-Y')}}
                            </p>
                            <span class="text-black text-lg font-medium font-['Inter'] truncate
                            text-left pl-2.5 pr-2.5">
                                {{$transaction->description}}
                            </span>
                            <div class="justify-between items-center gap-6 flex">
                                <div class="flex justify-end w-1/4">
                                <span class="text-right text-black text-lg font-medium font-['Inter'] pl-5 "
                                      style="color: {{$transaction->amount < 0 ? 'red' : 'green'}};">
                                   {{$transaction->amount}}
                                </span>
                                </div>
                                <div x-data="{ 'showLittleModal': false }" @keydown.escape="showLittleModal = false">
                                    <a href="#" class="nav_item_hover p-2 rounded-md block" @click="showLittleModal =
                                    true">
                                <span class="relative">
                                     <x-icon.more/>
                                 </span>
                                    </a>
                                    <x-modals.little-modal x-show="showLittleModal">
                                        <ul>
                                            <livewire:navigations.nav-item url="#" icon="edit" slot="Éditer"/>
                                            <livewire:navigations.nav-item url="#" icon="minus" slot="Supprimer"/>
                                        </ul>
                                    </x-modals.little-modal>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class=" border-b border-slate-200 mt-4 mb-4 w-full "></div>
                    <div class="w-full mt-auto">
                        {{$this->transactions->links('vendor.livewire.custom-pagination', data:['scrollTo'=>false]) }}
                    </div>
            </div>
        </div>
    </div>
</section>

