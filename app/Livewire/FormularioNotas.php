<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;

class FormularioNotas extends Component
{

	public $titulo;
	public $descripcion;
	public $estatus;

	protected $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'estatus' => [ 'required', 'in:completado,pendiente' ],
	];

	public function guardarNota() {

		// esto valida las variables de las $rules
		$data = $this -> validate();

		// dd($data);
		$id_usuario = auth() -> user() -> id;

		Nota::create([
			'titulo' => $data['titulo'],
			'descripcion' => $data['descripcion'],
			'estatus' => $data['estatus'],
			'fk_usuario' => $id_usuario
		]);


	}


    public function render()
    {

		$opciones = [
			[
				'id' => 0,
				'name' => 'Selecciona una opción'
			],
			[
				'id' => 'completado',
				'name' => 'Completado'
			],
			[
				'id' => 'pendiente',
				'name' => 'Pendiente'
			],
		];

		return view('livewire.formulario-notas', [
			'opciones' => $opciones
		]);
    }
}
