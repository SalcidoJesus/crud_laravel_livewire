<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
	 * esto muestra todas las notas
     */
    public function index()
    {
		// esto trae la pantala de index.blade.php de la carpeta de notas
        return view('notas.index');
    }

    /**
     * Show the form for creating a new resource.
	 * muestra el formulario para crear una nota
     */
    public function create()
    {
		return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
	 * guardar una nota en la BD
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
	 * muestra una nota en específico
     */
    public function show(string $id)
    {
		// busca un elemento por el id
		$nota = Nota::find($id);
		// dd($nota);

		return view('notas.show', [
			'nota' => $nota
		]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
