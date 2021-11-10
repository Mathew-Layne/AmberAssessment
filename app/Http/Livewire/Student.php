<?php

namespace App\Http\Livewire;

use App\Models\Student as ModelsStudent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    public $name, $email, $password;
    public $stidentId, $search;
    public $addform = false;
    public $editform = false;

    public function addStudent()
    {
        $addStudent = new User;
        $addStudent->name = $this->name;
        $addStudent->email = $this->email;
        $addStudent->password = Hash::make($this->password);
        $addStudent->user_type = "Student";
        $addStudent->save();

        $this->addform = false;
    }

    public function editStudent($id)
    {

        $this->editform = true;

        $data = User::find($id);
        $this->name = $data->name;        
        $this->email = $data->email;        

        $this->studentId = $id;
    }

    public function studentEdited()
    {
        $data = User::find($this->studentId);        
        $data->name = $this->name;        
        $data->email = $this->email;        
        $data->save();

    }
    public function render()
    {
        $students = User::where('user_type', 'Student')->paginate(5);
        // dd($students);
        return view('livewire.student', ['students' => $students]);
    }
}
