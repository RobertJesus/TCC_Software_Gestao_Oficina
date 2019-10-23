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
        $auto = Automobile::all();
        return view('automobiles.search', compact('auto'));
    }

    public function create()
    {
        $client = Client::where('status','=', 1)->get();
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
    public function edit($id)
    {
        $auto = Automobile::where('id', '=', $id)->get();
        return view('automobiles.edit', compact('auto'));
    }
    public function update(Request $request, $id){ 
        $auto = Automobile::find($id);
        
        $result = $auto->update($request->all());

        if($result){
            return redirect()
                    ->route('automobiles.index')
                    ->with('success', 'Veiculo atualizado com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
        }
    }
    public function destroy($id){

        $auto = Automobile::findOrFail($id);
        $result = $auto->delete();

        if($result){
            return redirect()
                    ->route('automobiles.index')
                    ->with('success', 'Veiculo excluido com sucesso!!!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function view($id)
    {   
        $auto = Automobile::where('id', '=', $id)->get();
        return view('automobiles.view', compact('auto'));
    }
    public function getClient($idclient)
    {
        $client = Client::where('name', '=', $idclient)->getQuery()->get(['id', 'record', 'email', 'name']);
        return Response::json($client);
    }
    public function search(Request $request)
    {
        $auto = Automobile::where('client', '=', $request['client'])
                        ->Orwhere('board', '=', $request['board'])->get();
        return view('automobiles.search', compact('auto'));
    }
}
