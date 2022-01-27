<?php

namespace App\Http\Livewire\Admin\Director;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class DirectorIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $teachers = User::role('Super-administrador')->where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.director.director-index', compact('teachers'));
    }
}
