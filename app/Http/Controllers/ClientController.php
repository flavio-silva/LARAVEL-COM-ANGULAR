<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Client;

use Illuminate\Http\Request;

use CodeProject\Http\Requests;

class ClientController extends Controller
{
    public function index()
    {
        return \CodeProject\Client::all();
    }

    public function store(Request $request)
    {
        return Client::create($request->all());
    }

    public function show($id)
    {
        if (Client::find($id))
        {
            return Client::find($id);
        }
        else{
            return "Erro: Cliente não encontrado.";
        }
    }

    public function destroy($id)
    {
        $entity = Client::find($id);
        if ($result)
        {
            $result->delete();
            return $message = "O Cliente ". $id ." foi excluido com sucesso.";
        }
        
        return "Erro: Cliente não encontrado, não foi possivel realizar a exclusão.";
    }

    public function update(Request $request, $id)
    {
        $entity = Client::find($id);
        
        if ($entity)
        {
            $entity->update($request->all());
            return Client::find($id);
        }
        
        return "Erro: Não foi possivel atualizar o Cliente.";
    }
}
