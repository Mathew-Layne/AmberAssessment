<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher as ModelsTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Teacher extends Component
{

    use WithPagination;

    public $addform = false;
    public $editform = false;
    public $assignform = false;
    public $assignstudentform = false;
    public $teacherName, $email, $student, $password;
    public $teacherId, $course;

    public function addTeacher()
    {

        $addteacher = new User();
        $addteacher->name = $this->teacherName;
        $addteacher->password = Hash::make($this->password);
        $addteacher->email = $this->email;
        $addteacher->user_type = "Teacher";
        $addteacher->save();

        $this->addform = false;
    }

    public function assignCourse($id)
    {
        $this->assignform = true;
        $this->teacherId = $id;
    }

    public function courseAssigned()
    {
        $assign = new ModelsTeacher();
        $assign->course_id = $this->course;
        $assign->user_id = $this->teacherName;
        $assign->save();

        $this->assignform = false;
    }


    public function assignStudent($id)
    {
        $this->assignstudentform = true;
        $this->teacherId = $id;
    }

    public function studentAssigned()
    {
        $assignStudent = new Student();
        $assignStudent->teacher_id = $this->teacherId;
        $assignStudent->user_id = $this->student;
        $assignStudent->save();

        $this->assignstudentform = false;
    }


    public function editTeacher($id)
    {

        $this->editform = true;

        $data = User::find($id);
        $this->teacherName = $data->name;
        $this->email = $data->email;

        $this->teacherId = $id;
    }

    public function teacherEdited()
    {
        $data = User::find($this->teacherId);
        $data->name = $this->teacherName;
        $data->email = $this->email;
        $data->save();
    }

    public function render()
    {
        $teachers = User::where('user_type', 'Teacher')->paginate(5);
        $teacherlists = User::where('id', $this->teacherId)->paginate(5);
        $courses = Course::all();
        $teacherDetails = ModelsTeacher::paginate(5);
        $studentlist = User::where('user_type', "Student")->get();
        $assignTeacher = ModelsTeacher::where('id', $this->teacherId)->get();

        return view('livewire.teacher', [
            'teachers' => $teachers,
            'teacherlists' => $teacherlists,
            'courses' => $courses,
            'teacherDetails' => $teacherDetails,
            'studentlist' => $studentlist,
            'assignTeacher' => $assignTeacher,
        ]);
    }
}
