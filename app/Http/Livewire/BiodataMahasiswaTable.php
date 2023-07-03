<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BiodataMahasiswaTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selectAll = false;
    public $selected = [];


    public function render()
    {
        return view('livewire.biodata-mahasiswa-table', [
            'users' => User::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = User::pluck('id');
        } else {
            $this->selected = [];
        }
    }

    public function pushUsers()
    {
        dd($this->selected);
        User::destroy($this->selected);
    }
}
