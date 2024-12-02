<x-modals.modal>
    <h1 class="text-[#2c2c2c] text-2xl font-semibold font-['Inter']">Ajouter un don à un fond</h1>
    <form form wire:submit="create" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="flex flex-col">
                <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="sum">Montant</label>
                <input class="border border-slate-300 rounded-lg" type="number" name="sum" id="sum" placeholder="0€">
            </div>
            <div class="flex justify-between items-end gap-4">
                <div class="flex flex-col gap-2 w-full">
                    <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="fund">Fond
                        bénéficiaire</label>
                    <select name="fund" id="fund" class="w-fullborder border-slate-300 rounded-lg">
                        <option value=""></option>
                    </select>
                </div>
                <form form wire:submit="create">
                    @csrf
                    <x-button.button class="buttons-confirm">Créer un nouveau fond</x-button.button>
                </form>
            </div>
            <div class="flex flex-col">
                <label class="text-[#2c2c2c] text-lg font-semibold font-['Inter']" for="description">Description</label>
                <textarea class="border border-slate-300 rounded-lg" name="description" id="description" cols="30"
                          rows="1"></textarea>
            </div>
            <div class="flex justify-between mt-4">
                <x-button.secondary-button class="buttons-default">Annuler</x-button.secondary-button>
                <x-button.button class="buttons-confirm">Confirmer</x-button.button>
            </div>
        </div>
    </form>
</x-modals.modal>
