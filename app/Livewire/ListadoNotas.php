<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoNotas extends Component
{

	use WithPagination;
	public $search = '';


    public function render()
    {
		// $notas = Nota::where('fk_usuario', auth()->user()->id);

		$notas = Nota::where('fk_usuario', auth()->user()->id)
		->where('titulo', 'like', '%'.$this -> search.'%')
		->orWhere('descripcion', 'like', '%'.$this -> search.'%')
		->paginate(10);

		// $notas = auth() -> user() -> notas;
		// dd( $notas );

        return view('livewire.listado-notas', [
			'notas' => $notas
		]);
    }
}
