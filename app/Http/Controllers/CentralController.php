<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\ServiceOrder;
use App\Models\Sales;
use App\Models\SalesProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class CentralController extends Controller
{
    public function index($name)
    {   
        $sales = DB::table('sales')->where('client_id','=', $name)->first();
        $protocol = $sales->protocol;
        $salesProduct = SalesProduct::where('protocol', '=', $protocol)->get();
        $total = DB::table("Sales")->where('protocol', '=',$protocol)->sum('totalPay');
        $client = Client::where('name', '=', $name)->get();
        $list = ServiceOrder::where('name', '=', $name)->paginate(10);
        return view('central.index', compact('name', 'list', 'client', 'salesProduct', 'total', 'protocol'));
    } 
    public function central()
    {
        return view('central.login');
    }
    public function view() 
    {
        return view('central.view');
    }
    public function login(Request $request)
    {
        $cpf = null;
        $name = null;
        $client = Client::where('record', '=', $request['record'])->get();
        foreach($client as $data){
           $cpf['record'] = $data['record'];
           $name = $data['name'];
        }
        
        if($cpf == null){
            return redirect()
                ->route('central.central')
                ->with('error', 'Registro não encontrado!');
        }
        if($request['record'] == $cpf['record']){
            //return view('central.index', compact('name'))->with('success', 'Seja bem vindo a central do assinante!');
            return redirect()
                ->route('central.index', $name)
                ->with('success', 'Seja bem vindo a central do assinante!');
        }
    }
    public function pdfCentral($id)
    {
    $sales = SalesProduct::where('protocol', '=', $id)->get();
    $protocol = DB::table('sales_products')->where('protocol','=', $id)->first();// $sales['protocol'];
    
    $total = Sales::where('protocol', '=', $id)->get();
    return \PDF::loadView('sales.pdfSales', compact('sales', 'total', 'protocol'))
          ->download('vendas.pdf');
    }
}
