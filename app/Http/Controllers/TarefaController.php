<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        // Exemplo de tarefas
        $tarefas = [
            ['id' => 1, 'titulo' => 'Comprar leite', 'concluida' => false],
            ['id' => 2, 'titulo' => 'Enviar relatório', 'concluida' => true],
            ['id' => 3, 'titulo' => 'Ler um livro', 'concluida' => false],
        ];

        return view('tarefas', compact('tarefas'));
    }
}


/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
class TarefaController extends Controller
{
    public function index(){
        return view('tarefas');
    }
}
*/