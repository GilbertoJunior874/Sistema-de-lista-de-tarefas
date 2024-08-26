<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TarefaController;
// Route::get('/', function () {
//     return view('welcome');

// });

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');;
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');

Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

Route::post('/tarefas/{id}/toggle', [TarefaController::class, 'toggle'])->name('tarefas.toggle');
