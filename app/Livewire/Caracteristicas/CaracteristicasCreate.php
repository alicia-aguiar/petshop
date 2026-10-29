<?php

namespace App\Livewire\Caracteristicas;

use App\Models\Caracteristicas;
use Livewire\Component;

class CaracteristicasCreate extends Component
{
    public $marcas;
    public $categorias;
    public $unidades_medida;
    public $tamanhos_embalagens;

    public function salvar()
    {
    $this->validate([
            'marcas' => 'required',
            'categorias' => 'required',
            'unidades_medida' => 'required|integer',
            'tamanhos_embalagens' => 'required|integer',
           
    ]);
        Caracteristicas::create([
            'marcas' => $this->marcas,
            'categorias' => $this->categorias,
            'unidades_medida' => $this->punidades_medida,
            'tamanhos_embalagens' => $this->tamanho_embalagens,

        ]);

        session()->flash(
        'success',
        'Característica cadastrada com sucesso'
        );

         session()->flash(
        'error',
        'Não foi possível concluir a operação'
        );

    }
    public function render()
    {
        $caracteristicas = Caracteristicas::all(); 

        return view('livewire.caracteristicas.caracteristicas-create', compact('caracteristicas'));
    }
}
