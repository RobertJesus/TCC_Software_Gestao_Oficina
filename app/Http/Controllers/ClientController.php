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
            'data' => ['required', 'int', 'max:8'],
            'CPF/CNPJ' => ['required', 'int', 'max:14'],
            'celular' => ['required', 'int', 'max:11'],
            'telefone' => ['required', 'int', 'telefone', 'max:10'],
            'endereço' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'int', 'max:5'],
            'cidade' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'int', 'max:8'],
        ]);
    }
}
