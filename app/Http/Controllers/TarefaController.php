<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {

        $tarefas = Tarefa::all();
        return view('tarefas', compact('tarefas'));

        // Exemplo de tarefas
        // $tarefas = [
        //     ['id' => 1, 'titulo' => 'Comprar leite', 'concluida' => false],
        //     ['id' => 2, 'titulo' => 'Enviar relatório', 'concluida' => true],
        //     ['id' => 3, 'titulo' => 'Ler um livro', 'concluida' => false],
        // ];

    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new tarefa using the validated data
        $tarefa = Tarefa::create($validatedData);

        // Redirect to the tarefas route with a success message
        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso');
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