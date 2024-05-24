<?php

namespace App\Livewire;

use App\Models\Tarea;
use Livewire\Component;

class ListadoTareas extends Component
{

	public bool $modal_abierto = false;
	public $titulo = 'perro titulo';
	public $descripcion = 'perro descripcion';
	public $estatus = 'perro estatus';


	public function abrirModal( Tarea $tarea) {
		$this -> titulo = $tarea -> titulo;
		$this -> descripcion = $tarea -> descripcion;
		$this -> estatus = $tarea -> estatus;
	}


	public function render()
    {
		$tareas = auth()->user()->tareas;

        return view('livewire.listado-tareas', [
			'tareas' => $tareas
		]);
    }
}
