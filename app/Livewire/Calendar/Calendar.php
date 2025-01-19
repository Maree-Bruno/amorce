<?php

namespace App\Livewire\Calendar;

use Livewire\Component;
use App\Models\Event;
use Carbon\Carbon;

class Calendar extends Component
{
    public $currentDate;
    public $currentMonth;
    public $currentYear;
    public $calendarDays = [];
    public $selectedDate;
    public $eventsOfTheDay = [];
    public $title;
    public $description;
    public $start_time;
    public $end_time;
    public $editingEventId = null; // ID de l'événement en cours d'édition
    public $selectedMonth;
    public $selectedYear;

    public $yearRange = []; // Stocke la plage d'années

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->selectedMonth = $this->currentMonth;
        $this->selectedYear = $this->currentYear;

        // Initialiser la plage d'années
        $this->yearRange = range($this->currentYear - 40, $this->currentYear + 40);

        $this->currentDate = now()->format('Y-m-d');
        $this->selectedDate = $this->currentDate;
        $this->generateCalendar();
    }




    public function jumpToMonth()
    {
        $this->currentMonth = $this->selectedMonth;
        $this->generateCalendar();
    }

    public function jumpToYear()
    {
        if (!is_numeric($this->selectedYear) || $this->selectedYear < 1900 || $this->selectedYear > 2100) {
            $this->selectedYear = $this->currentYear;
        }

        $this->currentYear = (int)$this->selectedYear;
        $this->generateCalendar();
    }


    public function generateCalendar()
    {
        $startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $startOfCalendar = $startOfMonth->copy()->startOfWeek(Carbon::MONDAY);
        $endOfCalendar = $endOfMonth->copy()->endOfWeek(Carbon::SUNDAY);

        $currentDay = $startOfCalendar->copy();
        $days = [];

        while ($currentDay->lte($endOfCalendar)) {
            $events = Event::whereDate('start_time', $currentDay->format('Y-m-d'))->get();
            $days[] = [
                'date' => $currentDay->format('Y-m-d'),
                'day' => $currentDay->day,
                'events' => $events,
            ];
            $currentDay->addDay();
        }

        $this->calendarDays = $days;

        $this->eventsOfTheDay = Event::whereDate('start_time', $this->selectedDate)->get();
    }

    public function previousMonth()
    {
        $this->currentMonth--;
        if ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }
        $this->selectedMonth = $this->currentMonth;
        $this->selectedYear = $this->currentYear;
        $this->generateCalendar();
    }

    public function nextMonth()
    {
        $this->currentMonth++;
        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        }
        $this->selectedMonth = $this->currentMonth;
        $this->selectedYear = $this->currentYear;
        $this->generateCalendar();
    }

    public function addEvent()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
        ]);

        Event::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        $this->resetForm();
        $this->generateCalendar();
        $this->dispatch('addEvent');
    }

    public function editEvent($eventId)
    {
        $event = Event::findOrFail($eventId);

        $this->editingEventId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->start_time = $event->start_time->format('Y-m-d\TH:i');
        $this->end_time = $event->end_time ? $event->end_time->format('Y-m-d\TH:i') : null;
    }

    public function updateEvent()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
        ]);

        $event = Event::findOrFail($this->editingEventId);
        $event->update([
            'title' => $this->title,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        $this->resetForm();
        $this->generateCalendar();
        $this->dispatch('updateEvent');
    }

    public function deleteEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $event->delete();

        $this->generateCalendar();
    }

    public function selectDay($date)
    {
        $this->selectedDate = $date;
        $this->eventsOfTheDay = Event::whereDate('start_time', $date)->get();

        $this->start_time = Carbon::parse($date)->format('Y-m-d\TH:i');
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['title', 'description', 'start_time', 'end_time', 'editingEventId']);
    }

    public function render()
    {
        $months = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre',
        ];

        return view('livewire.calendar.calendar', [
            'monthName' => $months[$this->currentMonth],
            'months' => $months,
            'currentYear' => $this->currentYear,
        ]);
    }
}
