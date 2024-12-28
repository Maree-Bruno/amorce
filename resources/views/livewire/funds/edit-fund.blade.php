<x-modals.modal>
    <h4 class="text-2xl font-semibold">Modifier un fond</h4>
    <form wire:submit.prevent="update">
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-2">
                <span class="text-lg font-semibold">Selectionner le fond à modifier</span>
                <select wire:model="fundId" name="fund" id="fund" class="border border-slate-300 rounded-lg">
                    <option value="">Sélectionnez un fond</option>
                    @foreach($funds as $fund)
                        <option value="{{ $fund->id }}" wire:key="{{$fund->id }}">{{ $fund->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="newFundName" class="text-lg font-semibold">Nouveau nom de fond</label>
                <input type="text" id="newFundName" wire:model="newFundName" class="border border-slate-300 rounded-lg">
            </div>
        </div>
        <div class="flex justify-between mt-4">
            <x-button.secondary-button icon="close" class="buttons-default self-start" @click="showEditFund
                =false">
                Annuler
            </x-button.secondary-button>
            <x-button.button class="buttons-confirm">
                Confirmer
            </x-button.button>

        </div>
    </form>
    @if(session()->has('message'))
        <div class="text-green-500">{{ session('message') }}</div>
    @endif

    @if(session()->has('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif
</x-modals.modal>
