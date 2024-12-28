<x-modals.modal>
    <div>
        <form wire:submit.prevent="deleteFund">
            <select wire:model="fundId" name="fund" id="fund" class="form-select">
                <option value="">Sélectionnez un fond</option>
                @foreach($funds as $fund)
                    <option value="{{ $fund->id }}" wire:key="{{$fund->id }}">{{ $fund->name }}</option>
                @endforeach
            </select>

            <!-- Bouton de suppression -->
            <x-button.button type="submit" class="buttons-confirm">
                Supprimer le fond
            </x-button.button>
        </form>

        <!-- Messages de feedback -->
        @if(session()->has('message'))
            <div class="text-green-500">{{ session('message') }}</div>
        @endif

        @if(session()->has('error'))
            <div class="text-red-500">{{ session('error') }}</div>
        @endif
    </div>
</x-modals.modal>
