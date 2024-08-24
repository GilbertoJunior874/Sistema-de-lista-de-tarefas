<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TarefaController;
// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');;
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
//Route::get('/tarefas', [TarefaController::class, 'index']);

//Route::resource('/', TarefaController::class);
