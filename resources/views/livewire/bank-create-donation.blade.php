 <x-modals.modal>
        <h1 class="text-[#2c2c2c] text-2xl font-semibold font-['Inter']">
            Ajouter un don à un fond
        </h1>
        <form wire:submit="save" class="mt-4">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="amount">
                        Montant
                    </label>
                    <input class="border border-slate-300 rounded-lg"
                           type="number"
                           name="amount"
                           id="amount"
                           placeholder="0€"
                           wire:model.blur="form.amount">
                </div>
                <div class="flex justify-between items-end gap-4">
                    <div class="flex flex-col gap-2 w-full">
                        <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="fund">
                            Fond bénéficiaire
                        </label>
                        <select id="fund"
                                wire:model.blur="form.fund_id"
                                class="w-full border border-slate-300 rounded-lg">
                            @foreach($funds as $fund)
                                <option value="{{ $fund->id }}" wire:key="{{$fund->id}}">{{ $fund->name }}</option>
                            @endforeach
                            <option value="create" wire:model="selectedFund">Créer un fond</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col">
                    <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="date">
                        Date
                    </label>
                    <input
                        type="date"
                        class="border border-slate-300 rounded-lg"
                        name="date"
                        id="date"
                        wire:model.blur="form.date">
                </div>
                <div class="flex flex-col">
                    <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="description">
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
            <div class="flex justify-between mt-4">
                <x-button.secondary-button icon="close" class="buttons-default" @click="showCreateDonation =false">
                    Annuler
                </x-button.secondary-button>
                <x-button.button icon="validate" class="buttons-confirm">
                    Confirmer
                </x-button.button>
            </div>
        </form>
    </x-modals.modal>
