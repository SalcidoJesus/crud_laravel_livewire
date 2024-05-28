<?php

namespace App\Livewire;

use App\Models\Tarea;
use Livewire\Component;

class FormularioEditarTarea extends Component
{

	public $id;
	public $titulo;
	public $descripcion;
	public $estatus;

    public function render()
    {

		$tarea = Tarea::find($this -> id);
		$this -> id = $tarea->id;
		$this -> titulo = $tarea->titulo;
		$this -> descripcion = $tarea->descripcion;
		$this -> estatus = $tarea->estatus;

		// dd($tarea);

		$lista_estatus = [
			[
				'id' => 0,
				'name' => 'Selecciona una opción'
			],
			[
				'id' => 'completado',
				'name' => 'Completado',
				'selected' => true
			],
			[
				'id' => 'pendiente',
				'name' => 'Pendiente'
			]
		];

        return view('livewire.formulario-editar-tarea', [
			'lista_estatus' => $lista_estatus,
			'nota' => $tarea
		]);
    }
}
