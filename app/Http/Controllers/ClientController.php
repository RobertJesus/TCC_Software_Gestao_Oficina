<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClientController;
use App\Models\client;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('client.new');
    }

    public function create(){
        return view('client.new');
    }

    public function store(Request $request, Client $client)
    {   
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'data' => ['required','date', 'max:11'],
            'CPF/CNPJ' => ['required', 'string', 'max:14'],
            'celular' => ['required','string', 'max:11'],
            'telefone' => ['required', 'string', 'max:10'],
            'endereco' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:5'],
            'cidade' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:8'],
        ]);

        $insert = $client->create($request->all());

        if($insert)
            return redirect()
                    ->route('new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
    }

    public function edit(){

    }

    public function update(){

    }
}
