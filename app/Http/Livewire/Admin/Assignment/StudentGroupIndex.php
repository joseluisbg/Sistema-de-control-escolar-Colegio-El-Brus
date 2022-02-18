<?php

namespace App\Http\Livewire\Admin\Assignment;

use App\Models\Ce_level_groups;
use App\Models\Ce_student;
use App\Models\Ce_user_enrolment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class StudentGroupIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render(Request $request)
    {
        $lg = 1;
        $infolg=Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
        ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
        ->select('ce_level_groups.id_lg AS idlg','L.name AS nomL','G.name AS nomG','L.id_area AS area','ce_level_groups.id_level AS idlevel','ce_level_groups.id_group AS idgroup')
        ->where('ce_level_groups.id_lg', '=', $lg)->get();
        $area = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
        ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
        ->where('ce_level_groups.id_lg', '=', $lg)->get('L.id_area');
        $area=$area[0]["id_area"];
        $students = Ce_student::where('id_area', $area)->where('status','Activo')->paginate(10);

        $alumasign=Ce_user_enrolment::join('ce_student as S', 'ce_user_enrolment.id_user', '=', 'S.id_student')
        ->join('ce_level_groups as LG', 'ce_user_enrolment.id_lg', '=', 'LG.id_lg')
        ->select('S.name AS nombre')
        ->where('LG.id_lg', $lg)->paginate(10);
        //$students = Ce_student::where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.assignment.student-group-index',compact('students','infolg','alumasign'));
    }
}
