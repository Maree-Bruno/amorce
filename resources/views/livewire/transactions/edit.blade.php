<x-modals.modal>
    <form wire:submit.prevent="save">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="flex flex-col">
                <label class=" text-lg font-semibold " for="amount">
                    Montant
                </label>
                <input class="border border-slate-300 rounded-lg"
                       type="number"
                       name="amount"
                       id="amount"
                       placeholder="0€"
                       wire:model.blur="form.amount">
                @error('form.amount') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-between items-end gap-4">
                <div class="flex flex-col w-full">
                    <label class=" text-lg font-semibold " for="fund">
                    </label>
                    <select id="fund"
                            wire:model.blur="form.fund_id"
                            class="w-full border border-slate-300 rounded-lg">
                        <option value="" selected>Sélectionner un fond</option>
                        @foreach($funds as $fund)
                            <option value="{{ $fund->id }}" wire:key="{{$fund->id}}">{{ $fund->name }}</option>
                        @endforeach
                    </select>
                    @error('form.fund_id') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex flex-col">
                <label class=" text-lg font-semibold " for="date">
                    Date
                </label>
                <input
                    type="date"
                    class="border border-slate-300 rounded-lg"
                    name="date"
                    id="date"
                    wire:model.blur="form.date"
                    value="{{$transaction->date}}"
                    placeholder="{{$transaction->date}}"
                >
                @error('form.date') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label class=" text-lg font-semibold " for="description">
                    Description
                </label>
                <textarea class="border border-slate-300 rounded-lg"
                          name="description"
                          id="description"
                          cols="30"
                          rows="4"
                          wire:model.blur="form.description">
                    </textarea>
            </div>
        </div>
        <div class="flex justify-between items-center px-8 py-4">
            <x-button.secondary-button
                class="buttons-default"
                icon="close"
                wire:click="cancel">
                    Annuler
            </x-button.secondary-button>
            <x-button.button class="buttons-confirm" icon="edit">
                Modifier
            </x-button.button>
            <x-button.secondary-button
                class="buttons-danger"
                icon="trash"
                wire:click="deleteTransaction"
            title="Supprimer cette transaction">
                Supprimer cette transaction
            </x-button.secondary-button>
        </div>
    </form>
</x-modals.modal>
