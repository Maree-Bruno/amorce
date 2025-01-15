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
                                    @if($fund->id != $form->benefit_fund_id)
                                        <option value="{{ $fund->id }}" wire:key="deficit-{{ $fund->id }}">
                                            {{ $fund->name }}
                                        </option>
                                    @endif
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
                                    @if($fund->id != $form->deficit_fund_id)
                                        <option value="{{ $fund->id }}" wire:key="benefit-{{ $fund->id }}">
                                            {{ $fund->name }}
                                        </option>
                                    @endif
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
            <template x-if="$wire.feedback">
                <div x-data="{
        init(){
            setTimeout(()=>{
                $wire.feedback = false;
            },10000)
        }
    }" class="absolute flex items-center justify-between max-w-3xl bg-green-500 rounded dissolve">
                    <div class="flex items-center">
                        <svg class="shrink-0 ml-4 mr-2 w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <polygon points="0 11 2 9 7 14 18 3 20 5 7 18"></polygon>
                        </svg>
                        <div class="py-4 text-white text-sm font-medium" x-html="$wire.feedback"></div>
                    </div>
                    <button type="button" class="group mr-2 p-2">
                        <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white"
                             xmlns="http://www.w3.org/2000/svg"
                             width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908">
                            <path
                                d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"></path>
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </form>
</x-modals.modal>
