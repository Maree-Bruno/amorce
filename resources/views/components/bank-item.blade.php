<div class="flex-col justify-start items-start gap-2.5 inline-flex">
    <div class="self-stretch flex-col justify-start items-start flex">
        <p class="self-stretch text-black text-base font-normal font-['Inter']">
            04/2024
        </p>
        <div class="self-stretch justify-between items-center inline-flex">
                            <span class="text-black text-xl font-semibold font-['Inter'] truncate max-w-52">
                                Description
                            </span>
            <div class="self-stretch justify-start items-center gap-6 flex">
                                <span class="text-right text-black text-xl font-semibold font-['Inter']">
                                    + 200 €
                                </span>
                <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
                    <a href="#" class="nav_item_hover p-2 rounded-md block" @click="showModal = true">
                    <span class="relative">
                        <x-icon.more/>
                    </span>
                    </a>
                    <x-modals.little-modal>
                        <ul>
                            <x-navigations.nav-item icon="edit">Éditer</x-navigations.nav-item>
                            <x-navigations.nav-item icon="minus">Supprimer</x-navigations.nav-item>
                        </ul>
                    </x-modals.little-modal>
                </div>
            </div>
        </div>
    </div>
</div>
