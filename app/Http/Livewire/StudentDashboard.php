<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Livewire\Component;

class StudentDashboard extends Component
{
    public function render()
    {
        $teacherDetails = Teacher::all();

        return view('livewire.student-dashboard',['teacherDetails' => $teacherDetails]);
    }
}
