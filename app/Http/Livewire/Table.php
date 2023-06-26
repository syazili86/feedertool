<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProfilPT;

class Table extends Component
{
    public function render()
    {
        return view('livewire.table', [
            'profils' => ProfilPT::paginate(5)
        ]);
    }
}
