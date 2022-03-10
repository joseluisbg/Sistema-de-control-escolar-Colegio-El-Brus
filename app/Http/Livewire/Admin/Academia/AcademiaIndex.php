<?php

namespace App\Http\Livewire\Admin\Academia;

use Livewire\Component;
use App\Models\Ce_academy;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AcademiaIndex extends Component
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
        $academias = Ce_academy::where('name', 'LIKE', '%' . $this->search . '%')->paginate();
        return view('livewire.admin.academia.academia-index', compact(['academias']));
    }
}
