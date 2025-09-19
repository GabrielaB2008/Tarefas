<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(){
        $tarefas = Tarefa::all();

        return response()->json($tarefas);
    }

    public function store(Request $request){
        $tarefa = Tarefa::create([
            'nome' => $request->nome,
            'data_hora' => $request->data_hora,
            'descricao' => $request->descricao
        ]);

        return response()->json($tarefa);
    }

    public function update(Request $request){
        //Buscar a tarefa que será atualizada
        $tarefa = Tarefa::find($request->id);

        //Verificar se a tarefa existe
        if($tarefa == null){
            return response()->json([
                'erro' => 'Tarefa não encontrada'
            ]);
        }

        //Verificar se o campo nome existe na request
        if(isset($request->nome)) {
        $tarefa->nome = $request->nome;
        }

        //Verificar se o campo data_hora existe na request
        if(isset($request->data_hora)){
        $tarefa->data_hora = $request->data_hora;
        }

        //Verificar se o campo descricao existe na request
        if(isset($request->descricao)){
        $tarefa->descricao = $request->descricao;
        }

        $tarefa->update();

        return response()->json([
            'mensagem' => 'Atualizada'
        ]);
    }

    public function show($id){
        //Pesquisa da tarefa por id
       $tarefa = Tarefa::find($id);

       //Verifica se a tarefa existe ou se a variável tarefa é nula
       if($tarefa == null){
        return response()->json([
            'erro' => 'Tarefa não encontrada'
        ]);
       }

       return response()->json($tarefa);
    }

    public function delete($id){
        $tarefa = Tarefa::find($id);

        if($tarefa == null){
            return response()->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }

        $tarefa->delete();

        return response()->json([
            'mensagem' => 'Excluído'
        ]);
    }

}
