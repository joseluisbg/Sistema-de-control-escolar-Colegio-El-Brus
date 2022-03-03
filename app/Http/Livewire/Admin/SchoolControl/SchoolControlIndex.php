<?php

namespace App\Http\Livewire\Admin\SchoolControl;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class SchoolControlIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $teachers = User::role('Control-escolar')->where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.school-control.school-control-index', compact('teachers'));
    }
}