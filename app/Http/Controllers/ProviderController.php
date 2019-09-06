<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controller\ControllerProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProviderController;
use App\Models\Provider;
use App\Models\Product;
use App\Models\ProvanProd;

class ProviderController extends Controller
{
    public function index()
    {
        return view('provider.search');
    }

    public function create()
    {
        return view('provider.new');
    }

    public function store(Request $request, Provider $provider){
        
        $insert = $provider->create($request->all());

        if($insert){
            return redirect()
                    ->route('provider.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
    }

    public function search(Request $request){

        $list = Provider::where('name', 'like', '%'.$request['name'].'%')
                    ->Orwhere('record', 'like', '%'.$request['name'].'%')->get();
                    
        $result = $list;
        
        if($result){
            return view('provider.search', compact('list'));
        }else{
            return redirect()
                    ->route('provider.search')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function edit($id){
        $provider = Provider::where('id', '=', $id)->get();
        
        return view('provider.edit', compact('provider'));
    }

    public function update(Request $request, $id){ 
        
        $provider = Provider::find($id);
        
        $result = $provider->update($request->all());

        if($result){
            return redirect()
                    ->route('provider.index')
                    ->with('success', 'Fornecedor atualizado com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
        }
    }
    public function destroy($id){
        
        $provider = Provider::findOrFail($id);
        $result = $provider->delete();
        if($result){
            return redirect()
                    ->route('provider.index')
                    ->with('success', 'Cliente excluido com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function view($id){
        $list = Provider::where('id','=', $id)->get();
        return view('provider.view', compact('list'));
    }

    public function products($id){
        
        $product = Provider::where('id', '=', $id)->get();
        
        foreach($product as $products){
            $list = $products->produtos;
        }

        return view('provider.viewProduct', compact('list'));
        
    }
}
