<x-modals.modal>
    <h3 class="text-2xl font-semibold">Ajouter un transfert</h3>
    <form wire:submit="save" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <!-- Montant -->
            <div class="flex flex-col">
                <label class="text-lg font-semibold" for="amount">
                    Montant
                </label>
                <input class="border border-slate-300 rounded-lg"
                       type="number"
                       name="amount"
                       id="amount"
                       placeholder="0€"
                       step="0.01"
                       wire:model.blur="form.amount">
                @error('form.amount')
                <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Date -->
            <div class="flex flex-col">
                <label class="text-lg font-semibold" for="date">
                    Date
                </label>
                <input
                    type="date"
                    class="border border-slate-300 rounded-lg"
                    name="date"
                    id="date"
                    wire:model.blur="form.date">
                @error('form.date')
                <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Fonds déficitaire et bénéficiaire -->
            <div class="flex justify-between items-end">
                <!-- Fond déficitaire -->
                <div class="flex justify-between items-end gap-4 w-1/3">
                    <div class="flex flex-col w-full">
                        <label class="text-lg font-semibold" for="deficit">
                            Fond déficitaire
                        </label>
                        <select id="deficit"
                                wire:model.blur="form.deficit_fund_id"
                                class="w-full border border-slate-300 rounded-lg">
                            <option value="" selected>Sélectionner un fond</option>
                            @foreach($funds as $fund)
                                @unless($fund->isProtected())
                                    @if($fund->id != $form->benefit_fund_id)
                                        <option value="{{ $fund->id }}" wire:key="{{ $fund->id }}">
                                            {{ $fund->name }}
                                        </option>
                                    @endif
                                @endunless
                            @endforeach
                        </select>
                        @error('form.deficit_fund_id')
                        <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Flèche pour indiquer le transfert -->
                <div>
                    <x-icon.transferarrow/>
                </div>

                <!-- Fond bénéficiaire -->
                <div class="flex justify-between items-end gap-4 w-1/3">
                    <div class="flex flex-col w-full">
                        <label class="text-lg font-semibold" for="benefit">
                            Fond bénéficiaire
                        </label>
                        <select id="benefit"
                                wire:model.blur="form.benefit_fund_id"
                                class="w-full border border-slate-300 rounded-lg">
                            <option value="" selected>Sélectionner un fond</option>
                            @foreach($funds as $fund)
                                @unless($fund->isProtected())
                                    @if($fund->id != $form->deficit_fund_id)
                                        <option value="{{ $fund->id }}" wire:key="{{ $fund->id }}">
                                            {{ $fund->name }}
                                        </option>
                                    @endif
                                @endunless
                            @endforeach
                        </select>
                        @error('form.benefit_fund_id')
                        <span class="error text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="flex flex-col">
                <label class="text-lg font-semibold" for="description">
                    Description
                </label>
                <textarea class="border border-slate-300 rounded-lg"
                          name="description"
                          id="description"
                          cols="30"
                          rows="4"
                          wire:model.blur="form.description"></textarea>
                @error('form.description')
                <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex justify-between mt-4">
            <x-button.secondary-button icon="close" class="buttons-default self-start" @click="showCreateTransfer = false">
                Annuler
            </x-button.secondary-button>
            <x-button.button icon="validate" class="buttons-confirm self-end" @click="click = true; setTimeout(() => click = false, 1000)">
                Confirmer
            </x-button.button>
        </div>
    </form>
</x-modals.modal>
