<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

        /*$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'data' => ['required', 'max:11'],
            'CPF/CNPJ' => ['required', 'max:14'],
            'celular' => ['required', 'max:11'],
            'telefone' => ['required', 'max:10'],
            'endereco' => ['required', 'max:255'],
            'numero' => ['required', 'max:5'],
            'cidade' => ['required', 'max:255'],
            'cep' => ['required', 'max:8'],
        ]);*/

        $insert = $client->create($request->all());

        if($insert)
            return redirect()
                    ->route('new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
    }

    public function edit($id){
        $client = Client::where('id', '=', $id)->get();
        
        return view('client.edit', compact('client'));
    }

    public function update(Request $request){
        $id = $request['id'];
        $client = Client::find($id);

        $result = $client->save();

        if($result)
            return redirect()
                    ->route('view')
                    ->with('success', 'Cliente atualizado com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
    }
    public function destroy($id){
        $users = Client::findOrFail($id);
        $result = $users->delete();
        if($result)
            return redirect()
                    ->route('search')
                    ->with('success', 'Cliente excluido com sucesso!');
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
    }
    public function view($id){
        $list = Client::where('id','=', $id)->get();
        return view('client.view', compact('list'));
    }
    public function search(){
        $list = Client::all();
        return view('client.search', compact('list'));
    }
}
