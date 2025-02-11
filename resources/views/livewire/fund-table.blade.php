<section class="w-11/12">
    <h3 class="sr-only">Interface des fonds</h3>
    <div class="w-full border-slate-200 border shadow-md rounded-2xl p-4">
        <div
            x-data="{
        updatePerPage() {
            if (window.innerWidth <= 768) {
                @this.set('perPage', 9);
            } else if (window.innerWidth <= 1920) {
                @this.set('perPage', 10);
            } else {
                @this.set('perPage', 20);
            }
        }
    }"
            x-init="updatePerPage()"
            @resize.window.debounce.200ms="updatePerPage()"
        >
            <livewire:fund-bar-nav/>
            <div class="border-t border-slate-200 mt-4 mb-4"></div>
            <div class="flex-col justify-start items-start w-full">
                <div class="flex flex-row justify-between w-full pl-2 pr-2">
                    <h4 class="font-semibold text-lg  xl:text-3xl">Solde</h4>
                    <span class="font-semibold text-lg  xl:text-3xl">{{isset($total) ? number_format($total, 2, ',', '
                                         ') . ' '.'€' : ''}}</span>
                </div>
                <div class="border-b border-slate-200 mt-4 w-full"></div>
                <div class="w-full">
                    <table class="table-auto w-full border border-slate-200">
                        <thead class="rounded-t-lg">
                        <tr>
                            <th class="border border-slate-200 px-4 py-2 text-left w-20">
                                <x-button.filter-button :responsive="true" icon="date" wire:click="sort('date')" class="flex
                                items-center">
                                    Date
                                </x-button.filter-button>
                            </th>
                            <th class="border border-slate-200 px-4 py-2 text-left sr-only md:not-sr-only">
                                <x-button.filter-button :responsive="true" icon="description" wire:click="sort('description')"
                                                        class="flex items-center">
                                    Description
                                </x-button.filter-button>
                            </th>
                            <th class="border border-slate-200 px-4 py-2 text-right ">
                                <x-button.filter-button :responsive="true" icon="currency" wire:click="sort('amount')" class="block
                                w-full">
                                    Montant
                                </x-button.filter-button>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="rounded-b-lg">
                        @foreach($this->transactions as $transaction)
                            <tr wire:key="{{$transaction->id}}">
                                <td class="border border-slate-200 w-20">
                                    <a class="flex items-center px-1 py-2" href="{{route('transactions.edit',
                                    ['transaction' =>
                                    $transaction->id])}}"
                                       wire:navigate>
                                        {{$transaction->date->format('m-Y')}}
                                    </a>
                                </td>
                                <td class="border border-slate-200  truncate sr-only md:not-sr-only">
                                    <a href="{{route('transactions.edit', ['transaction' => $transaction->id])}}"
                                       class="flex items-center px-1 py-2" wire:navigate>
                                        {{ $transaction->description }}
                                    </a>
                                </td>
                                <td class="border border-slate-200" style="color:
                                {{$transaction->amount < 0 ? 'red' : 'green'}};">
                                    <a class="flex flex-row items-center px-1 py-2" href="{{route('transactions.edit',
                                    ['transaction' =>
                                    $transaction->id])}}"
                                       wire:navigate>
                                        {{isset($transaction->amount) ? number_format($transaction->amount, 2, ',', '
                                         ') . ' '.'€' : ''}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full mt-4">
                    {{$this->transactions->links('vendor.livewire.custom-pagination', data:['scrollTo'=>false]) }}
                </div>
            </div>
        </div>
    </div>
</section>
