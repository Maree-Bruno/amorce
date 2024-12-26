<x-modals.modal>
    <h3 class="text-[#2c2c2c] text-2xl font-semibold">Ajouter plusieurs dons</h3>
    <form wire:submit.prevent="import" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="flex w-full">
                <label class="w-full text-[#2c2c2c] text-lg font-semibold font-['Inter'] flex flex-col gap-3"
                       for="csvFile">Importer le fichier au format CSV
                    <input id="csvFile"
                           name="csvFile"
                           type="file"
                           accept=".csv"
                           wire:model="csvFile"
                           class="border border-slate-200 p-3 rounded-lg w-full cursor-pointer font-medium text-base">
                </label>
            </div>
        </div>

        @if ($csvRecords)
            <div class="mt-4">
                <div class="overflow-auto max-h-96 border border-slate-300 rounded-lg">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-slate-300 px-4 py-2">Date</th>
                            <th class="border border-slate-300 px-4 py-2">Description</th>
                            <th class="border border-slate-300 px-4 py-2">Montant</th>
                            <th class="border border-slate-300 px-4 py-2">Fond</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($csvRecords as $index => $record)
                            <tr>
                                <td class="border border-slate-300 px-4 py-2">{{ $record[0] }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record[8] }}</td>
                                <td class="border border-slate-300 px-4 py-2">{{ $record[2] }}</td>
                                <td class="border border-slate-300 px-4 py-2">
                                    <select wire:model="selectedFunds.{{ $index }}" class="border border-slate-200 p-2 rounded-lg w-full">
                                        @foreach($funds as $fund)
                                            <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success mt-4">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                {{ implode(', ', $errors->all()) }}
            </div>
        @endif
        <div class="flex justify-between mt-4">
            <a href="" class="buttons p-2.5 flex-row flex-auto justify-center items-center gap-2 flex nav_item_hover buttons-default" wire:navigate>Annuler</a>
            <x-button.button class="buttons-confirm" wire:click="import">Confirmer</x-button.button>
        </div>
    </form>
</x-modals.modal>
