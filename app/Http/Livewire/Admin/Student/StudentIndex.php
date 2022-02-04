<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\Ce_student;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $students = Ce_student::where('name', 'LIKE', '%' .$this->search. '%')->orWhere('matricula', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.student.student-index', compact('students'));
    }
}

