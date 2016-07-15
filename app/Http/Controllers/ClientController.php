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
        if (Client::find($id))
        {
            Client::find($id)->delete();
            return $message = "O Cliente ". $id ." foi excluido com sucesso.";
        }
        else{
            return "Erro: Cliente não encontrado, não foi possivel realizar a exclusão.";
        }
    }

    public function update(Request $request, $id)
    {
        if (Client::find($id))
        {
            Client::find($id)->update($request->all());
            return Client::find($id);
        }
        else{
            return "Erro: Não foi possivel atualizar o Cliente.";
        }
    }
}
