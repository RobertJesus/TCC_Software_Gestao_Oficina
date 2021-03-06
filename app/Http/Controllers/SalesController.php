<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesProduct;
use App\Models\ServiceOrder;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Sales::paginate(10);
        
        return view('sales.search', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $client = Client::all();
        $product = Product::where('amount', '>', 0)->get();

        return view('sales.new', compact('client', 'product'));
    }

    public function getProduct($idProduct){
        
        $product = Product::where('id', '=', $idProduct)->getQuery()->get(['id', 'amount', 'priceOld']);

        return Response::json($product);
    }
    public function getClient($idclient){
        $client = ServiceOrder::where('name', '=', $idclient)->getQuery()->get(['id', 'protocol']);

        return Response::json($client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $produtos = [];
        for($i=0; $i < count($request->amount); $i++){
            $produtos = Product::find($request['product_id']);
            $produtos[$i]['amount'] = $produtos[$i]['amount'] - $request->amount[$i];
            dd($produtos[$i]);
            exit();
            $produtos[$i]->save();
        }
        //$id = Client::where('name', '=', $request['name'])->find();//->select('id')->first()->get();
        unset($request['produto']);
        unset($request['totalPro']);
        
        $this->sales = new Sales();
        $this->salesProduct = new SalesProduct();
        
        $result = $this->sales->create([
            'client_id' => $request->client_id,
            'typePay' => $request->typePay,
            'protocol' => $request->protocol,
            'protocolOrder' => $request->protocolOrder,
            'totalPay' => $request->totalVenda[0],
        ]);
        
        for ($i = 0; $i < count($request->amount); $i++){
           $result = $this->salesProduct->create([
                    'protocol' => $request->protocol,
                    'name' => $request->name_product[$i],
                    'amount' => $request->amount[$i],
                    'desc' => $request->desc[$i] ,
                    'product_id' => $request->product_id[$i],
                    'price' => $request->price[$i],
                    'priceV' => $request->priceV[$i],
                    'total' => $request->total[$i],
            ]);
        } 
        if($result){
            return redirect()
                    ->route('sales.index')
                    ->with('success', 'Venda cadastrada com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$sales = Sales::where('protocol','=', $id)->findOrFail();
        $sales = Sales::where('protocol', '=', $id)->get();
        foreach($sales as $data){
            $idSales = $data['id'];
        }
        $salesV = Sales::findOrFail($idSales);
        $result = $salesV->delete();

        if($result){
            return redirect()
                    ->route('sales.index')
                    ->with('success', 'Venda excluida com sucesso!!!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao excluir');
        }
    }
    public function search(Request $request)
    {
        $list = Sales::where('client_id', '=', $request['client'])
                    ->Orwhere('protocol', '=', $request['protocol'])->paginate(10);
                    
        $result = $list;
        
        if($result){
            return view('sales.search', compact('list'));
        }else{
            return redirect()
                    ->route('sales.index')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function pdfSales($id)
    {
    $sales = SalesProduct::where('protocol', '=', $id)->get();
    $protocol = DB::table('sales_products')->where('protocol','=', $id)->first();// $sales['protocol'];
    
    $total = Sales::where('protocol', '=', $id)->get();
    return \PDF::loadView('sales.pdfSales', compact('sales', 'total', 'protocol'))
          ->download('vendas.pdf');
    }
    public function pdf()
    {
        $sales = Sales::all();
        $total = DB::table("sales")->sum('totalPay');
        return \PDF::loadView('sales.pdf', compact('sales', 'total'))
          ->download('vendas.pdf');
    }
}
