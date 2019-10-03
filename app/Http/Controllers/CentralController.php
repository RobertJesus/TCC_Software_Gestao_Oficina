<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ServiceOrder;


class CentralController extends Controller
{
    public function index($name)
    {   
        $client = Client::where('name', '=', $name)->get();
        $list = ServiceOrder::where('name', '=', $name)->get();
        
        return view('central.index', compact('name', 'list'));
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
}
