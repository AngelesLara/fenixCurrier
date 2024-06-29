<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsuarioIndex extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        //$users = User::where('name', 'LIKE', '%'. $this->search . '%')->paginate(); --- busca por 1 solo.

        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')->paginate();
        return view('livewire.admin.usuario-index', compact('users'));
    }
}
