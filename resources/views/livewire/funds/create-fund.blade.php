<x-modals.modal>
    <h4 class="xl:text-2xl font-semibold">Créer un fond</h4>
    <form wire:submit="save" class="mt-4">
        @csrf
        <div class="flex flex-col gap-4">
            <label for="name" class=" xl:text-lg font-semibold ">Nom du fond</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="border border-slate-300 rounded-lg"
                   wire:model.blur="name">
        </div>
        <div class="flex justify-between mt-4">
            <x-button.secondary-button icon="close" class="buttons-default self-start" @click="showCreateFund
                =false">
                Annuler
            </x-button.secondary-button>
            <x-button.button icon="validate" class="buttons-confirm self-end" @click="click = true; setTimeout(
                () => click = false, 1000)">
                Confirmer
            </x-button.button>

            <template x-if="$wire.feedback">
                <div x-data="{
        init(){
            setTimeout(()=>{
                $wire.feedback = false;
            },10000)
        }
    }" class="absolute flex items-center justify-between max-w-3xl bg-green-500 rounded dissolve">
                    <div class="flex items-center">
                        <svg class="shrink-0 ml-4 mr-2 w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <polygon points="0 11 2 9 7 14 18 3 20 5 7 18"></polygon>
                        </svg>
                        <div class="py-4 text-white text-sm font-medium" x-html="$wire.feedback"></div>
                    </div>
                    <button type="button" class="group mr-2 p-2">
                        <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white"
                             xmlns="http://www.w3.org/2000/svg"
                             width="235.908" height="235.908" viewBox="278.046 126.846 235.908 235.908">
                            <path
                                d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"></path>
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </form>
</x-modals.modal>
