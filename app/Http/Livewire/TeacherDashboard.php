<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherDashboard extends Component
{
    public function render()
    {
        $teacherDetails = Teacher::where('user_id', Auth::id())->get();
        return view('livewire.teacher-dashboard', ['teacherDetails' => $teacherDetails]);
    }
}
