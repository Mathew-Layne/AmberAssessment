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
    public $schedule, $scheduleId;

    public function addSchedule()
    {
        $addschedule = new ModelsSchedule();
        $addschedule->date_time = $this->schedule;
        $addschedule->save();

        $this->addform = false;
    }


    public function editSchedule($id)
    {

        $this->editform = true;

        $schedule = ModelsSchedule::find($id);
        $this->schedule = $schedule->date_time;

        $this->scheduleId = $id;
    }

    public function scheduleEdited()
    {

        $editschedule = ModelsSchedule::find($this->scheduleId);
        $editschedule->date_time = $this->schedule;
        $editschedule->save();

        $this->editform = false;
    }


    public function render()
    {
        $schedules = ModelsSchedule::paginate(5);
        return view('livewire.schedule', ['schedules' => $schedules]);
    }
}
