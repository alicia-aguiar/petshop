<?php

namespace App\Livewire\Caracteristicas;

use App\Models\Caracteristicas;
use Livewire\Component;

class CaracteristicasIndex extends Component
{
    public function render()
    {
    
        $caracteristicas = Caracteristicas::all();

        return view('livewire.caracteristicas.caracteristicas-index', compact('caracteristicas'));
    }
}
