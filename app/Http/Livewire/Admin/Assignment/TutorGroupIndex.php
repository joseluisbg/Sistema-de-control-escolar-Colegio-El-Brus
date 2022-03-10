<?php

namespace App\Http\Livewire\Admin\Assignment;

use Livewire\Component;
use App\Models\Ce_level_groups;
use App\Models\Ce_course_teacher;
use App\Models\User;
use Livewire\WithPagination;

class TutorGroupIndex extends Component
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
        $grupos = Ce_level_groups::join('ce_level as L', 'ce_level_groups.id_level', '=', 'L.id_level')
            ->join('ce_group as G', 'ce_level_groups.id_group', '=', 'G.id_group')
            ->where('G.name', 'LIKE', '%' . $this->search . '%')
            ->select('ce_level_groups.id_lg AS idlg', 'L.name AS nomL', 'G.name AS nomG', 'L.id_area AS area')
            ->paginate();
        $teachers = User::role('Docente')
            ->where('status', 'Activo')
            ->get();
        return view('livewire.admin.assignment.tutor-group-index', compact(['grupos', 'teachers']));
    }
}
