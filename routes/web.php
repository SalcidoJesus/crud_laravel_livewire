<?php

use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// notas
Route::middleware('auth')->group(function () {
	// esto muesta la lista de notas
	Route::get('/notas', [ NotaController::class, 'index' ])->name('notas.index');
	// esto muesta el formulario para crear una nota
	Route::get('/notas/create', [ NotaController::class, 'create' ])->name('notas.create');
	Route::get('/notas/{id}', [ NotaController::class, 'show' ])->name('notas.show');
	Route::get('/notas/{id}/edit', [ NotaController::class, 'edit' ])->name('notas.edit');

});





// rutas para tareas
// esto muestra la lista de tareas
Route::get('/tareas', [TareaController::class, 'index'])->middleware(['auth'])->name('tareas.index');
// esto muestra el formulario para crear una tarea
Route::get('/tareas/create', [TareaController::class, 'create'])->middleware(['auth'])->name('tareas.create');
Route::get('/tareas/{id}/edit', [TareaController::class, 'edit'])->middleware(['auth'])->name('tareas.edit');

require __DIR__.'/auth.php';
