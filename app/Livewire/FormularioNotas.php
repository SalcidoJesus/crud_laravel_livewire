<?php

namespace App\Livewire;

use App\Models\Nota;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Mary\Traits\Toast;

class FormularioNotas extends Component
{

	use Toast;

	public $titulo;
	public $descripcion;
	public $estatus;

	protected $rules = [
		'titulo' => ['required', 'max:255'],
		'descripcion' => 'required',
		'estatus' => ['required', 'in:completado,pendiente'],
	];

	public function guardarNota()
	{

		// esto valida las variables de las $rules
		$data = $this->validate();

		// dd($data);
		$id_usuario = auth()->user()->id;

		try {

			Nota::create([
				'titulo' => $data['titulo'],
				'descripcion' => $data['descripcion'],
				'estatus' => $data['estatus'],
				'fk_usuario' => $id_usuario
			]);

			// alerta de éxito
			$this->success('Nota guardada con éxito');
			$this->reset();
		} catch (QueryException $e) {

			// alerta de error
			$this->error('Ocurrió un error al guardar');
		}
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
