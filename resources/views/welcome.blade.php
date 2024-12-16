<x-app-layout>
    <h2 class="text-black text-5xl font-bold font-[Inter] p-2.5">Bienvenue !</h2>
    <section x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <x-button.secondary-button type="button" class="buttons-confirm" @click="showModal = true">Open modal</x-button.secondary-button>
        {{--<x-modals.modal>
            <x-button.button class="buttons-confirm">
                Button
            </x-button.button>
            <x-button.secondary-button icon="close" class="buttons-default" @click="showModal = false">
                Close
            </x-button.secondary-button>
        </x-modals.modal>--}}
    </section>
</x-app-layout>
