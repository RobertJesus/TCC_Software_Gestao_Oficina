<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientController;
use App\Models\client;
use Nexmo\Laravel\Facade\Nexmo;
use App\Models\ServiceOrder;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('client.search');
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
        unset($request['rad']);
    
        $insert = $client->create($request->all());

        if($insert){
            return redirect()
                    ->route('client.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
    }

    public function edit($id){
        $client = Client::where('id', '=', $id)->get();
        
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id){ 
        
        $client = Client::find($id);
        
        $result = $client->update($request->all());

        if($result){
            return 
                    redirect()
                    ->route('client.index')
                    ->with('success', 'Cliente atualizado com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
        }
    }
    public function destroy($id){
        
        $users = Client::findOrFail($id);
        $result = $users->delete();
        if($result){
            return redirect()
                    ->route('client.index')
                    ->with('success', 'Cliente excluido com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function view($id){
        $list = Client::where('id','=', $id)->get();
        
        return view('client.view', compact('list'));
    }
    public function search(Request $request){

        $list = Client::where('name', '=', $request['name'])
                    ->Orwhere('record', '=', $request['name'])->get();
                    
        $result = $list;
        
        if($result){
            return view('client.search', compact('list'));
        }else{
            return redirect()
                    ->route('client.search')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function msg(Request $request){
        
        $id = $request->id;
            
        $result = Nexmo::message()->send([
            'to'   => $request->num,
            'from' => '16105552344',
            'text' => $request->msg,
        ]);
        if($result){
            return redirect()
                    ->route('client.view', $id)
                    ->with('success', 'Mensagem enviada com sucesso!!!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Erro ao enviar mensagem');
        }
    }

    public function orders($id)
    {
        $client = Client::where('id', '=', $id)->get();
        
        foreach($client as $data){
            $list = $data->Orders->where('status','=', 'Aberto');
        }
        return view('client.order', compact('list'));
    }
}
