<?php

namespace App\Livewire;

use App\Models\Tarea;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Mary\Traits\Toast;

class FormularioEditarTarea extends Component
{
	use Toast;

	public $id;
	public $titulo;
	public $descripcion;
	public $estatus;
	public $mostrarModalBorrar = false;


	protected $rules = [
		'titulo' => ['required', 'string'],
		'descripcion' => 'required|string',
		'estatus' => ['required', 'in:completado,pendiente'],
	];

	public function editar() {

		$this -> validate();

		try {

			$tarea = Tarea::find($this -> id);
			$tarea -> titulo = $this -> titulo;
			$tarea -> descripcion = $this -> descripcion;
			$tarea -> estatus = $this -> estatus;
			$tarea -> save();

			// alerta de éxito
			$this->success('Nota guardada con éxito');

		} catch (QueryException $e) {

			// alerta de error
			$this->error('Ocurrió un error al guardar');
		}

	}


	public function eliminareliminar() {

	}

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
