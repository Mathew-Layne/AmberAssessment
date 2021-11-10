<?php

namespace App\Http\Livewire;

use App\Models\Course as ModelsCourse;
use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;

class Course extends Component
{
    use WithPagination;

    public $addform = false;
    public $editform = false;

    public $courseId, $schedule, $course, $search, $success;

    public function addSubject()
    {
        $addcourse = new ModelsCourse();
        $addcourse->course_name = $this->course;
        $addcourse->schedule_id = $this->schedule;
        $addcourse->save();        

        $this->addform = false;
    }

    public function editcourse($id)
    {

        $this->editform = true;

        $course = ModelsCourse::find($id);
        $this->course = $course->course_name;
        $this->schedule = $course->schedule_id;
        $this->courseId = $id;
    }

    public function courseEdited()
    {

        $subjects = ModelsCourse::find($this->courseId);
        $subjects->course_name = $this->course;
        $subjects->schedule_id = $this->schedule;
        $subjects->save();

        $this->editform = false;
    }

    public function render()
    {
        $courses = ModelsCourse::paginate(5);
        $schedules = Schedule::all();
        return view('livewire.course', ['courses' => $courses, 'schedules' => $schedules]);
    }
}
