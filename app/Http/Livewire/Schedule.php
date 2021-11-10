<?php

namespace App\Http\Livewire;

use App\Models\Schedule as ModelsSchedule;
use Livewire\Component;
use Livewire\WithPagination;

class Schedule extends Component
{
    use WithPagination;

    public $addform = false;
    public $editform = false;
    public $schedule, $scheduleId, $start_time, $end_time;

    public function addSchedule()
    {
        $addschedule = new ModelsSchedule();
        $addschedule->day = $this->schedule;
        $addschedule->start_time = $this->start_time;
        $addschedule->end_time = $this->end_time;
        $addschedule->save();

        $this->addform = false;
    }


    public function editSchedule($id)
    {

        $this->editform = true;

        $schedule = ModelsSchedule::find($id);
        $this->schedule = $schedule->day;
        $this->start_time = $schedule->start_time;
        $this->end_time = $schedule->end_time;

        $this->scheduleId = $id;
    }

    public function scheduleEdited()
    {

        $editschedule = ModelsSchedule::find($this->scheduleId);
        $editschedule->day = $this->schedule;
        $editschedule->start_time = $this->start_time;
        $editschedule->end_time = $this->end_time;
        $editschedule->save();

        $this->editform = false;
    }


    public function render()
    {
        $schedules = ModelsSchedule::paginate(5);
        return view('livewire.schedule', ['schedules' => $schedules]);
    }
}
