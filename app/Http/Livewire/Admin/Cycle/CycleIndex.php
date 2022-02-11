<?php

namespace App\Http\Livewire\Admin\Cycle;

use App\Models\Ce_cycle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CycleIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cycles = Ce_cycle::where('name', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.cycle.cycle-index', compact('cycles'));
    }
}
