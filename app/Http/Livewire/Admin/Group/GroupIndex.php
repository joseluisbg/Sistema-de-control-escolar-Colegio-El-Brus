<?php

namespace App\Http\Livewire\Admin\Group;

use App\Models\Ce_group;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class GroupIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $groups = Ce_group::where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.group.group-index', compact('groups'));
    }
}
