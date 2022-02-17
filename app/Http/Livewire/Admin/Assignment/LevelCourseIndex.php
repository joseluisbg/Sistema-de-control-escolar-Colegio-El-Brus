<?php

namespace App\Http\Livewire\Admin\Assignment;

use App\Models\Ce_course;
use App\Models\Ce_level;
use App\Models\Ce_level_courses;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LevelCourseIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $courses = Ce_course::where('name', 'LIKE', '%' .$this->search. '%')->orWhere('nick_sep', 'LIKE', '%' .$this->search. '%')->paginate();
        $levels = Ce_level::where('status', 'Activo')->get();
        $levelCo= Ce_level_courses::where('status', 'Activo')->get();
        return view('livewire.admin.assignment.level-course-index', compact(['courses', 'levels', 'levelCo']));
    }
}
