<?php

namespace App\Http\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TeacherIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        //$teachers = User::role('Docente')->where('name', 'LIKE', '%' .$this->search. '%')->orWhere('email', 'LIKE', '%' .$this->search. '%')->paginate();
        $teachers = User::role('Docente')->where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.teacher.teacher-index', compact('teachers'));
    }
}
