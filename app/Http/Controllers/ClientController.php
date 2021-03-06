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
        $list =  Client::where('status', '=',1)->paginate(10);
        return view('client.search', compact('list'));
    }

    public function create(){
        return view('client.new');
    }

    public function store(Request $request, Client $client)
    {   
        unset($request['rad']);
        
        $insert = $client->create($request->all());

        if($insert){
            return redirect()
                    ->route('client.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao cadastrar');
        }
    }

    public function edit($id)
    {
        $client = Client::where('id', '=', $id)->get();    
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {    
        $client = Client::find($id);
        $request['status'] = $client['status'];
        
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
    public function toFile($id)
    {
        $client = Client::findOrFail($id);
        $client['status'] = 2;//Arquivado
        $cli[] = $client;
        $result = $client->update($cli);
        if($result){
            return redirect()
                    ->route('client.index')
                    ->with('success', 'Cliente arquivado com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function destroy($id)
    {    
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
    public function view($id)
    {
        $list = Client::where('id','=', $id)->get();    
        return view('client.view', compact('list'));
    }
    public function search(Request $request)
    {
        $list = Client::where('name', '=', $request['name'])
                    ->Orwhere('record', '=', $request['record'])
                    ->Orwhere('status','=', $request['status'])->paginate(10);
        $result = $list;
        
        if($result){
            return view('client.search', compact('list'));
        }else{
            return redirect()
                    ->route('client.search')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function msg(Request $request)
    {   
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
    public function pdf()
    {
    $client = Client::all();
        //return view('product.pdf', compact('products'));
    return \PDF::loadView('client.pdf', compact('client'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
          ->download('clientes.pdf');
    }
}
