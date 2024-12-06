<x-modals.modal>
    <h1 class="text-[#2c2c2c] text-2xl font-semibold font-['Inter']">Ajouter plusieurs dons</h1>
    <form form wire:submit.prevent="import" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="flex flex-col">
                <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="csv">Importer le fichier au format CSV</label>
                <input id="csv"
                       name="csv"
                       type="file"
                       accept="text/csv*"
                       wire:model="csvFile"
                       class="border border-slate-300 rounded-lg p-2.5">
            </div>
        </div>
    </form>
            <div class="flex justify-between mt-4">
                <x-button.secondary-button class="buttons-default">Annuler</x-button.secondary-button>
                <x-button.button class="buttons-confirm">Confirmer</x-button.button>
            </div>
</x-modals.modal>
