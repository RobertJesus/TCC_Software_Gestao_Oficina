<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Automobile;
use Illuminate\Support\Facades\Response;

class AutomobilesController extends Controller
{
    public function index()
    {
        return view('automobiles.new');
    }

    public function create()
    {
        $client = Client::all();
        return view('automobiles.new', compact('client'));
    }

    public function store(Request $request, Automobile $auto)
    {
        $insert = $auto->create($request->all());

        if($insert){
            return redirect()
                    ->route('automobiles.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
    }
    public function getClient($idclient)
    {
        $client = Client::where('name', '=', $idclient)->getQuery()->get(['id', 'record', 'email', 'name']);
        return Response::json($client);
    }
}
