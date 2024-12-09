<section class="flex flex-row gap-10">
    <h3 class="sr-only">Interface des fonds</h3>
    <div class="min-w-fit w-11/12 border-slate-200 border shadow-md rounded-2xl p-4">
        <livewire:fund-bar-nav/>
        <div class=" border-t border-slate-200 mt-4 mb-4"></div>
        <div class="flex-col justify-start items-start inline-flex w-full">
            <div class="flex flex-row justify-between w-full pl-2 pr-2">
                <h4 class="font-semibold text-3xl font-[Inter]">Solde</h4>
                <span class="font-semibold text-3xl font-[Inter]">{{ number_format($total, 2) }}</span>
            </div>
            <div class=" border-b border-slate-200 mt-4 mb-4 w-full "></div>
            <div class="self-stretch flex-col justify-start items-start flex gap-2.5">
                @foreach($this->transactions as $transaction)
                    <div class="self-stretch flex-col justify-start items-start flex  ">
                        <p class="self-stretch text-black text-base font-normal font-['Inter']">
                            {{$transaction->date->format('m-Y')}}
                        </p>
                        <div class="self-stretch justify-between items-center inline-flex">
                            <span class="text-black text-lg font-semibold font-['Inter'] truncate max-w-56">
                                {{$transaction->description}}
                            </span>
                            <div class="self-stretch justify-start items-center gap-6 flex">
                                <span class="text-right text-black text-lg font-semibold font-['Inter']">
                                   {{$transaction->amount}}
                                </span>
                                <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
                                    <a href="#" class="nav_item_hover p-2 rounded-md block" @click="showModal = true">
                                <span class="relative">
                                     <x-icon.more/>
                                 </span>
                                    </a>
                                    <x-modals.little-modal>
                                        <ul>
                                            <x-navigations.nav-item url="#" icon="edit">Éditer</x-navigations.nav-item>
                                            <x-navigations.nav-item url="#" icon="minus">Supprimer</x-navigations.nav-item>
                                        </ul>
                                    </x-modals.little-modal>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class=" border-b border-slate-200 mt-4 mb-4 w-full "></div>
                <div class="w-full mt-auto">
                    {{$this->transactions->links('vendor.livewire.custom-pagination')}}
                </div>
            </div>
        </div>
    </div>
</section>
