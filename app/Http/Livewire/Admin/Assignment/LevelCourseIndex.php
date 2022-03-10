<?php

namespace App\Http\Livewire\Admin\Assignment;

use App\Models\Ce_course;
use App\Models\Ce_course_teacher;
use App\Models\Ce_level;
use App\Models\Ce_level_courses;
use App\Models\Ce_level_groups;
use App\Models\Ce_lg_ct;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LevelCourseIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $lg = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
            ->join('ce_area as A', 'L.id_area', '=', 'A.id_area')
            ->select('ce_level_groups.id_lg AS idlg', 'L.name AS nomL', 'G.name AS nomG', 'A.name AS area')
            ->get();

        $ct = Ce_course_teacher::join('ce_course as C', 'ce_course_teacher.id_course', '=', 'C.id_course')
            ->join('users as U', 'ce_course_teacher.id_user', '=', 'U.id')
            ->join('ce_area as A', 'C.id_area', '=', 'A.id_area')
            ->where('C.name', 'LIKE', '%' . $this->search . '%')
            ->select('C.name AS curso', 'C.nickname AS nickCurso', 'A.name AS area', 'U.name AS nomProfe', 'U.last_name AS apellido', 'ce_course_teacher.id_ct AS id_ct')
            ->paginate(10);

        $lgct = Ce_lg_ct::join('ce_level_groups as LG', 'ce_lg_ct.id_lg', '=', 'LG.id_lg')
            ->join('ce_course_teacher as CT', 'ce_lg_ct.id_ct', '=', 'CT.id_ct')
            ->join('ce_level as L', 'LG.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'LG.id_group', '=', 'G.id_group')
            ->join('ce_area as A', 'L.id_area', '=', 'A.id_area')
            ->join('ce_course as C', 'CT.id_course', '=', 'C.id_course')
            ->join('users as U', 'CT.id_user', '=', 'U.id')
            ->select('LG.id_lg AS idlg', 'L.name AS nomL', 'G.name AS nomG', 'A.name AS area', 'C.name AS curso', 'C.nickname AS nickCurso', 'A.name AS area', 'U.name AS nomProfe', 'U.last_name AS apellido', 'CT.id_ct AS id_ct')
            ->get();

        // $courses = Ce_course::where('name', 'LIKE', '%' .$this->search. '%')->orWhere('nick_sep', 'LIKE', '%' .$this->search. '%')->paginate();
        // $levels = Ce_level::where('status', 'Activo')->get();
        // $levelCo= Ce_level_courses::where('status', 'Activo')->get();
        //return view('livewire.admin.assignment.level-course-index', compact(['courses', 'levels', 'levelCo']));
        return view('livewire.admin.assignment.level-course-index', compact(['lg', 'ct', 'lgct']));
    }
}
