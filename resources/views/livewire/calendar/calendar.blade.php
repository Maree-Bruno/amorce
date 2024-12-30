<div class="p-6 flex flex-col w-full gap-6">
    <h2 class=" text-5xl font-bold p-2.5">Calendrier</h2>
    <!-- Section principale -->
    <div class="flex flex-row w-full justify-between gap-6">
        <!-- Calendrier -->
        <div class="w-10/12 bg-white rounded-lg shadow-md p-6">
            <!-- Navigation des mois -->
            <div class="flex items-center justify-between mb-6">
                <x-button.secondary-button wire:click="previousMonth" class="buttons-confirm">
                    ← Mois précédent
                </x-button.secondary-button>
                <div class="flex">
                    <select wire:model="selectedMonth" wire:change="jumpToMonth" class="w-full border border-slate-300 rounded-lg">
                        @foreach(range(1, 12) as $month)
                            <option autocapitalize="on" value="{{ $month }}">{{ \Carbon\Carbon::create()->month
                            ($month)->locale('fr')
                            ->translatedFormat('F') }}</option>
                        @endforeach
                    </select>

                    <!-- Sélection de l'année -->
                    <select wire:model="selectedYear" wire:change="jumpToMonth" class="border border-slate-300 rounded-lg">
                        @foreach(range($currentYear - 10, $currentYear + 10) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>

                </div>
                <x-button.secondary-button wire:click="nextMonth" class="buttons-confirm">
                    Mois suivant →
                </x-button.secondary-button>
            </div>

            <!-- Grille du calendrier -->
            <div class="grid grid-cols-7 gap-2 relative">
                <!-- Entêtes des jours -->
                @foreach(['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'] as $day)
                    <div class="text-center font-bold">{{ $day }}</div>
                @endforeach

                <!-- Jours et événements -->
                @foreach($calendarDays as $day)
                    <div
                        class="p-4 border rounded-lg text-center
           {{ $day['date'] === $currentDate ? 'buttons-confirm  font-bold' : 'bg-gray-50' }} buttons-default cursor-pointer
           relative" wire:click="selectDay('{{ $day['date'] }}')">
                        <div class="font-semibold">{{ $day['day'] }}</div>
                        <!-- Pastille rouge si événements -->
                        @if(count($day['events']) > 0)
                            <div
                                class="absolute top-1 right-1 w-3 h-3 bg-red-500 rounded-full"
                                title="Nombre d'événements : {{ count($day['events']) }}"
                            ></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Événements sélectionnés -->
        <div class="w-1/3 bg-white rounded-lg shadow-md p-6">
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
                        <div class="flex space-x-4">
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
    @if($selectedDate)
        <!-- Formulaire d'ajout ou de modification -->
        <div class="w-full bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">
                {{ $editingEventId ? 'Modifier l\'événement' : 'Ajouter un événement' }}
            </h3>
            <form wire:submit.prevent="{{ $editingEventId ? 'updateEvent' : 'addEvent' }}" class="space-y-4">
                <!-- Titre -->
                <div>
                    <label class="block text-base font-semibold">Titre</label>
                    <input type="text" wire:model="title"
                           class="w-full mt-1 px-4 py-2 border rounded-lg"
                           placeholder="Titre de l'événement" required>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-base font-semibold">Description</label>
                    <textarea wire:model="description"
                              class="w-full mt-1 px-4 py-2 border rounded-lg"
                              placeholder="Description de l'événement"></textarea>
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-2 gap-4">
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

                <!-- Boutons -->
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
