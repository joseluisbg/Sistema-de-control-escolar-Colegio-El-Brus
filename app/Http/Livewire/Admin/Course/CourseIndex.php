<?php

namespace App\Http\Livewire\Admin\Course;

use App\Models\Ce_course;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
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
        return view('livewire.admin.course.course-index', compact('courses'));
    }
}
