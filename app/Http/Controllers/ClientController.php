<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Client;

use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use Symfony\Component\Debug\Exception\FatalThrowableError;

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
        return Client::find($id);
    }

    public function destroy($id)
    {
        try{
            Client::find($id)->delete();
            return $message = "O Cliente ". $id ." foi excluido com sucesso.";
        }
        catch (FatalThrowableError $e)
        {
            return $message = "Não foi possivel excluir o cliente". $id .", o Cliente não Existe";
        }

    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id)->update($request->all());
    }
}
