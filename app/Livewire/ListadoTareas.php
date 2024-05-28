<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;

class ListadoTareas extends Component
{

	public ?Nota $nota;
	public $titulo;
	public $descripcion;
	public $estatus;
	public $mostrarModal;


	public function llenarModal( Nota $nota_1 )
	{

		$this -> nota = $nota_1;
		$this -> titulo = $nota_1-> titulo;
		$this -> descripcion = $nota_1-> descripcion;
		$this -> estatus = $nota_1-> estatus;
	}

	public function editar( $id )
	{
		$nota_encontrada = Nota::find($id);
		// dd($nota_encontrada);
		$this -> llenarModal( $nota_encontrada );
		$this -> mostrarModal = true;

	}

	public function render()
    {
		$tareas = auth()->user()->tareas;

        return view('livewire.listado-tareas', [
			'tareas' => $tareas
		]);
    }

}
