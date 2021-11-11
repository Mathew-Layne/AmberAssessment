<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentDashboard extends Component
{
    public function render()
    {
        $teacherDetails = Student::where('user_id', Auth::id())->get();

        return view('livewire.student-dashboard',['teacherDetails' => $teacherDetails]);
    }
}
