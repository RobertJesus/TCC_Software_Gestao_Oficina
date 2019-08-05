<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function insert(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'data' => ['required', 'max:11'],
            'CPF/CNPJ' => ['required', 'max:14'],
            'celular' => ['required', 'max:11'],
            'telefone' => ['required', 'max:10'],
            'endereco' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'max:5'],
            'cidade' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'max:8'],
        ]);
        return redirect()->route('new')->withSuccess('Usuário atualizado com sucesso!');
    }
}
