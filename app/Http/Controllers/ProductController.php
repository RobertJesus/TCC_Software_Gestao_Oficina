<?php

namespace App\Http\Controllers;
use App\Controller\ControllerProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProductController;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.new');
    }

    public function create()
    {
        return view('product.new');
    }

    public function store(Request $request, Product $product){
        
        $insert = $product->create($request->all());

        if($insert){
            return redirect()
                    ->route('newPro')
                    ->with('success', 'Produto Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
    }

    public function search(Request $request){

        $list = Product::where('name', 'like', '%'.$request['name'].'%')
                    ->Orwhere('record', 'like', '%'.$request['name'].'%')->get();
                    
        $result = $list;
        
        if($result){
            return view('product.search', compact('list'));
        }else{
            return redirect()
                    ->route('search')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function edit($id){
        $product = Product::where('id', '=', $id)->get();
        
        return view('provider.edit', compact('provider'));
    }

    public function update(Request $request, $id){ 
        
        $provider = Product::find($id);
        
        $result = $product->update($request->all());

        if($result){
            return redirect()
                    ->route('indexPro')
                    ->with('success', 'Fornecedor atualizado com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
        }
    }
    public function destroy($id){
        
        $product = Product::findOrFail($id);
        $result = $product->delete();
        if($result){
            return redirect()
                    ->route('indexPro')
                    ->with('success', 'Cliente excluido com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function view($id){
        $list = Product::where('id','=', $id)->get();
        return view('provider.view', compact('list'));
    }
}
