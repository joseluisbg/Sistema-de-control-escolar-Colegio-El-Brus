<?php

namespace App\Http\Livewire\Admin\Assignment;

use App\Models\Ce_course;
use App\Models\Ce_course_teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CourseTeacherIndex extends Component
{
     use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $courses = Ce_course::where('name', 'LIKE', '%' .$this->search. '%')->orWhere('rep_sep', 'LIKE', '%' .$this->search. '%')->paginate();
        $teachers = User::role('Docente')->where('status', 'Activo')->get();
        return view('livewire.admin.assignment.course-teacher-index', compact(['courses', 'teachers']));
    }
}
