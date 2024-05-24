<?php

namespace App\Livewire;

use Livewire\Component;

class ListadoTareas extends Component
{

	public function render()
    {
		$tareas = auth()->user()->tareas;

        return view('livewire.listado-tareas', [
			'tareas' => $tareas
		]);
    }
}
