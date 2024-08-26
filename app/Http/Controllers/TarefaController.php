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
    }
    //metodo update
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tarefa = Tarefa::create($validatedData);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso');
    }
    //metodo delet
    public function destroy($id)
    {
        // Encontrar a tarefa pelo ID

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
    }
    //metodo update status
    public function toggle($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        // Alternar o status da tarefa
        $tarefa->status = !$tarefa->status;
        $tarefa->save();
        return redirect()->route('tarefas.index')->with('success', 'Status da tarefa atualizado com sucesso.');
    }
}
