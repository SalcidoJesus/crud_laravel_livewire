<?php

namespace App\Livewire;

use App\Models\Tarea;
use Livewire\Component;

class FormularioTareas extends Component
{

	public $titulo = '';
	public $descripcion = '';
	public $estatus = 0;

	protected $rules = [
		'titulo' => 'required|string',
		'descripcion' => 'required|string',
		'estatus' => 'required'
	];


	public function crearTarea() {

		$datos = $this -> validate();

		// dd([
		// 	'datos' => $datos,
		// 	'otro' => [
		// 		'titulo' => $this->titulo,
		// 		'descripcion' => $this->descripcion,
		// 		'estatus' => $this->estatus
		// 	]
		// ]);
		$id_usuario = auth() -> user() -> id;

		Tarea::create([
			'titulo' => $datos['titulo'],
			'descripcion' => $datos['descripcion'],
			'estatus' => $datos['estatus'],
			'fk_usuario' => $id_usuario
		]);

		$this -> dispatch('tarea-guardada');

		$this -> reset();
		// $this -> reset([ 'titulo', 'descripcion', 'estatus' ]);

	}

    public function render()
    {

		$lista_estatus = [
			[
				'id' => 0,
				'name' => 'Selecciona una opción',
				'selected' => true
			],
			[
				'id' => 'completado',
				'name' => 'Completado'
			],
			[
				'id' => 'pendiente',
				'name' => 'Pendiente'
			]
		];

        return view('livewire.formulario-tareas', [
			'lista_estatus' => $lista_estatus
		]);
    }
}
