<?php

namespace App\Livewire;

use App\Models\Nota;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Mary\Traits\Toast;

class FormularioEditarNota extends Component
{

	use Toast;
	// el id se pasa en la etiqueta
	public $id;
	public $titulo;
	public $descripcion;
	public $estatus;

	public $opciones = [
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

	protected $rules = [
		'titulo' => ['required', 'max:255'],
		'descripcion' => 'required',
		'estatus' => ['required', 'in:completado,pendiente'],
	];

	public function actualizarNota() {

		$this -> validate();

		try {

			$nota = Nota::find( $this -> id);
			$nota -> titulo = $this -> titulo;
			$nota -> descripcion = $this -> descripcion;
			$nota -> estatus = $this -> estatus;
			$nota -> save();

			// alerta de que todo está bien
			$this -> success(
				'Nota actualizada',
				redirectTo: '/notas'
			);

		} catch (QueryException $e) {

			// alerta de error
			$this -> error(
				'Ocurrio un error al actualizar la nota',
				css: 'text-white',
				timeout: 5000
			);

		}
		// return redirect('/notas');

	}

    public function render()
    {

		// buscamos nota por su ID y lo guardamos en nota_actual
		$nota_actual = Nota::find( $this -> id );

		// izquierda es variable, derecha es cambpo de la BD
		$this -> titulo =  $nota_actual -> titulo;
		$this -> descripcion =  $nota_actual -> descripcion;
		$this -> estatus =  $nota_actual -> estatus;

		return view('livewire.formulario-editar-nota');
    }
}
