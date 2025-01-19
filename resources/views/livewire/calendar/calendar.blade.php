<div class="flex flex-col w-full gap-6">
    <h2 class="text-black text-3xl font-bold p-2.5 xl:text-5xl">Calendrier</h2>
    <div class="flex flex-col w-full justify-between gap-6 xl:flex-row">
        <div class="bg-white rounded-lg shadow-md p-6 xl:w-10/12">
            <div class="flex items-center justify-between gap-2 mb-6 xl:flex-row">
                <x-button.secondary-button :responsive="true" wire:click="previousMonth" class="buttons-confirm" icon="previous">
                     Mois précédent
                </x-button.secondary-button>
                <div class="flex flex-col xl:flex-row gap-2">
                    <select wire:model="selectedMonth" wire:change="jumpToMonth"
                            class="w-full border border-slate-300 rounded-lg">
                        @foreach(range(1, 12) as $month)
                            <option autocapitalize="on" value="{{ $month }}">{{ \Carbon\Carbon::create()->month
                            ($month)->locale('fr')
                            ->translatedFormat('F') }}</option>
                        @endforeach
                    </select>

                    <select wire:model="selectedYear" wire:change="jumpToMonth"
                            class="border border-slate-300 rounded-lg">
                        @foreach(range($currentYear - 10, $currentYear + 10) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>

                </div>
                <x-button.secondary-button :responsive="true" wire:click="nextMonth" class="buttons-confirm"
                                           icon="next">
                    Mois suivant
                </x-button.secondary-button>
            </div>

            <div class="grid grid-cols-7 gap-2 relative">
                @foreach(['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'] as $day)
                    <div class="text-center font-bold sr-only xl:not-sr-only">{{ $day }}</div>
                @endforeach

                @foreach($calendarDays as $day)
                    <div
                        class=" border rounded-lg text-center xl:p-4
           {{ $day['date'] === $currentDate ? 'buttons-confirm  font-bold' : 'bg-gray-50' }} buttons-default cursor-pointer
           relative" wire:click="selectDay('{{ $day['date'] }}')">
                        <div class="font-semibold">{{ $day['day'] }}</div>
                        @if(count($day['events']) > 0)
                            <div
                                class="absolute top-0  w-3 h-3 bg-red-500 rounded-full"
                                title="Nombre d'événements : {{ count($day['events']) }}"
                            ></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @if($selectedDate)
            <div class="w-full bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">
                    {{ $editingEventId ? 'Modifier l\'événement' : 'Ajouter un événement' }}
                </h3>
                <form wire:submit.prevent="{{ $editingEventId ? 'updateEvent' : 'addEvent' }}" class="space-y-4">
                    <div>
                        <label class="block text-base font-semibold">Titre</label>
                        <input type="text" wire:model="title"
                               class="w-full mt-1 px-4 py-2 border rounded-lg"
                               placeholder="Titre de l'événement" required>
                    </div>

                    <div>
                        <label class="block text-base font-semibold">Description</label>
                        <textarea wire:model="description"
                                  class="w-full mt-1 px-4 py-2 border rounded-lg"
                                  placeholder="Description de l'événement"></textarea>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div>
                            <label class="block text-base font-semibold">Début</label>
                            <input type="datetime-local" wire:model="start_time"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg"
                                   required>
                        </div>
                        <div>
                            <label class="block text-base font-semibold">Fin</label>
                            <input type="datetime-local" wire:model="end_time"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg">
                        </div>
                    </div>

                    <div class="flex justify-between">
                        @if($editingEventId)
                            <x-button.secondary-button wire:click="cancelEdit"
                                                       class="buttons-default">
                                Annuler
                            </x-button.secondary-button>
                        @endif
                        <x-button.button class="buttons-confirm">
                            {{ $editingEventId ? 'Enregistrer les modifications' : 'Ajouter l\'événement' }}
                        </x-button.button>
                    </div>
                </form>
            </div>
        @endif
    </div>
    <div class="w-full bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold mb-4">
            Événements pour le {{ \Carbon\Carbon::parse($selectedDate)->format('d/m/Y') }}
        </h3>
        <ul class="space-y-2 overflow-y-auto max-h-[calc(100vh-400px)]">
            @forelse($eventsOfTheDay as $event)
                <li class="flex flex-col justify-between bg-gray-100 rounded-md px-4 py-2"
                    wire:key="{{$event}}">
                    <div class="">
                        <div class="font-semibold">{{ $event->title }}</div>
                        <div class="text-sm">
                            {{ $event->start_time->format('d-m-Y H:i') }}
                            - {{ optional($event->end_time)->format('d-m-Y H:i') }}
                        </div>
                    </div>
                    <div class="flex justify-between gap-2 flex-col xl:flex-row">
                        <x-button.secondary-button wire:click="editEvent({{ $event->id }})" wire
                                                   class="buttons-confirm" icon="edit">
                            Modifier
                        </x-button.secondary-button>
                        <x-button.secondary-button wire:click="deleteEvent({{ $event->id }})"
                                                   class="buttons-danger" icon="trash">
                            Supprimer
                        </x-button.secondary-button>
                    </div>
                </li>
            @empty
                <li>Aucun événement pour ce jour.</li>
            @endforelse
        </ul>
    </div>

</div>
