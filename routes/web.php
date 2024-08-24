<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TarefaController;
Route::get('/', function () {
    return view('welcome');

});

Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
//Route::get('/tarefas', [TarefaController::class, 'index']);
