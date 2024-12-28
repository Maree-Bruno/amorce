<x-modals.modal>
    <h4 class="text-2xl font-semibold">Supprimer un fond</h4>
    <form wire:submit.prevent="deleteFund">
        <div class="flex flex-col gap-4 mt-4">
            <div class="flex flex-col gap-2">
                <span class="text-lg font-semibold">Sélectionner le fond à modifier</span>
                <select wire:model="fundId" name="fund" id="fund" class="border border-slate-300 rounded-lg">
                    <option value="">Sélectionnez un fond</option>
                    @foreach($funds as $fund)
                        @unless($fund->isProtected())
                            <option value="{{ $fund->id }}" wire:key="{{ $fund->id }}">
                                {{ $fund->name }}
                            </option>
                        @endunless
                    @endforeach
                </select>
            </div>
            <div class="flex justify-between mt-4">
                <x-button.secondary-button icon="close" class="buttons-default self-start" @click="showDeleteFund
                =false">
                    Annuler
                </x-button.secondary-button>
                <x-button.button class="buttons-confirm" icon="trash">
                    Supprimer le fond
                </x-button.button>
            </div>
        </div>
    </form>

    <!-- Messages de feedback -->
    @if(session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif

</x-modals.modal>
