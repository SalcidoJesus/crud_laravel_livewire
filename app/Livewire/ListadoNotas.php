<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;

class ListadoNotas extends Component
{

	public $search = '';


    public function render()
    {
		// $notas = Nota::where('fk_usuario', '=', auth()->user()->id);

		$notas = auth() -> user() -> notas;
		// $notas = $notas::search( $this -> search );
		// dd( $notas );

        return view('livewire.listado-notas', [
			'notas' => $notas
		]);
    }
}
