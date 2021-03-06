<?php

namespace App\Http\Controllers;
use App\Controller\ControllerProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Provider;
use App\Models\ProvandProd;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $list = Product::paginate(10);
        return view('product.search', compact('list'));
    }

    public function create()
    {   
        $provider = Provider::all();
        return view('product.new', compact('provider'));
    }

    public function store(Request $request, Product $product, ProvandProd $ProvandProd){
        
        $id = Provider::where('nameFant', '=', $request['provider'])->get();

        $insert = $product->create($request->all());
        foreach($id as $data){
            $provader_id['provider_id'] = $data['id']; 
        }
        
        $ProProd = $provader_id;
        $ProProd['product_id'] = $insert['id'];
        
        $result = $ProvandProd->create($ProProd);
        
        if($insert){
            return redirect()
                    ->route('product.new')
                    ->with('success', 'Produto cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao cadastrar!');
        }
    }

    public function search(Request $request){

        $list = Product::where('description', '=', $request['name'])
                    ->Orwhere('brand', '=', $request['brand'])
                    ->Orwhere('cod', '=', $request['cod'])->paginate(10);
                    
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
        $provider = Provider::all();
        $product = Product::where('id', '=', $id)->get();
        
        return view('product.edit', compact('product', 'provider'));
    }

    public function update(Request $request, $id){ 
        
        $product = Product::find($id);
        
        $result = $product->update($request->all());

        if($result){
            return redirect()
                    ->route('product.index')
                    ->with('success', 'Produto atualizado com sucesso!');
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
                    ->route('product.index')
                    ->with('success', 'Produto excluido com sucesso!!!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function view($id)
    {
        $product = Product::where('id','=', $id)->get();
        
        return view('product.view', compact('product'));
    }
    public function pdf()
    {
    $products = Product::all();
        //return view('product.pdf', compact('products'));

    return \PDF::loadView('product.pdf', compact('products'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
          ->download('produtos.pdf');
    }
}
