<?php

namespace App\Http\Livewire\Admin\Level;

use App\Models\Ce_level;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class LevelIndex extends Component
{
   use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $levels = Ce_level::where('name', 'LIKE', '%' .$this->search. '%')->orWhere('nickname', 'LIKE', '%' .$this->search. '%')->paginate();
        return view('livewire.admin.level.level-index', compact('levels'));
    }
}
