<nav class="inline-flex justify-center items-center w-full gap-12">
    <h4 class="sr-only">Navigation des fonds</h4>
    <div class="whitespace-nowrap overflow-x-scroll scroll-m-1 scroll-p-1 overscroll-x-contain">
        <ul class="inline-flex">
            @foreach($funds as $fund)
                <x-navigations.nav-item url="{{ route('fund.index', ['fund' => $fund->id]) }}" class="inline-block"
                                        wire:navigate>
                    {{$fund->name}}
                </x-navigations.nav-item>
            @endforeach
        </ul>
    </div>
    <div class="relative ml-auto" x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <x-button.secondary-button icon="more" class="buttons" @click="showModal = true">Plus
        </x-button.secondary-button>
        <x-modals.little-modal>
            <ul class="flex flex-col gap-2">
                <x-navigations.nav-item icon="plus" url="/funds/{{$fund->id}}/create">Ajouter
                </x-navigations.nav-item>
                <x-navigations.nav-item icon="edit" url="/funds/{{$fund->id}}/edit">Éditer</x-navigations.nav-item>
                <x-navigations.nav-item icon="minus" url="/funds/{{$fund->id}}/delete">Supprimer
                </x-navigations.nav-item>
            </ul>
        </x-modals.little-modal>
    </div>
</nav>
