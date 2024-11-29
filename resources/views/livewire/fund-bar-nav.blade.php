<nav class="inline-flex items-start justify-start w-full">
    <h4 class="sr-only">Navigation des fonds</h4>
    <ul class="inline-flex gap-2">
        @foreach($funds as $fund)
            <x-navigations.nav-item href="#">{{$fund->name}}</x-navigations.nav-item>
        @endforeach
    </ul>
    <div class="relative ml-auto" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <x-button.secondary-button icon="more" class="buttons" @click="showModal = true">Plus</x-button.secondary-button>
        <x-modals.little-modal>
            <ul class="flex flex-col gap-2">
                <x-navigations.nav-item icon="plus">Ajouter</x-navigations.nav-item>
                <x-navigations.nav-item icon="edit">Éditer</x-navigations.nav-item>
                <x-navigations.nav-item icon="minus">Supprimer</x-navigations.nav-item>
            </ul>
        </x-modals.little-modal>
    </div>
</nav>
