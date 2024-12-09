<x-modals.modal>
    <h1 class="text-[#2c2c2c] text-2xl font-semibold font-['Inter']">Ajouter plusieurs dons</h1>
    <form form wire:submit.prevent="import" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="flex w-full">
                <label class="w-full text-[#2c2c2c] text-lg font-semibold font-['Inter'] flex flex-col gap-3"
                       for="csv">Importer le fichier au format CSV
                    <input id="csv"
                           name="csv"
                           type="file"
                           accept="text/csv*"
                           wire:model="csvFile"
                           class="border border-slate-200 p-3 rounded-lg w-full cursor-pointer font-medium text-base">
                </label>
            </div>
        </div>
    </form>
    <div class="flex justify-between mt-4">
        <a href="" class="buttons p-2.5 flex-row flex-auto justify-center items-center gap-2 flex nav_item_hover
        buttons-default" wire:navigate>Annuler</a>
        <x-button.button class="buttons-confirm">Confirmer</x-button.button>
    </div>
</x-modals.modal>
