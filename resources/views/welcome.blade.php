@php use App\Models\User; @endphp
<x-app-layout>
    <h2 class=" text-5xl font-bold p-2.5">Bienvenue {{Auth::user()->name}}!</h2>
    <section x-data="{ showModal: false, showCreate: false }" @keydown.escape.window="showModal = false; showCreate = false">
        <x-button.secondary-button class="buttons-confirm" @click="showModal = true">
            Open modal
        </x-button.secondary-button>
        <div x-show="showModal" x-cloak>
            <x-modals.modal>
                    <x-button.secondary-button class="buttons-confirm" @click="showCreate = true">
                        Button
                    </x-button.secondary-button>
                    <x-button.secondary-button icon="close" class="buttons-default" @click="showModal = false">
                        Close
                    </x-button.secondary-button>
            </x-modals.modal>
        </div>
    </section>
</x-app-layout>
