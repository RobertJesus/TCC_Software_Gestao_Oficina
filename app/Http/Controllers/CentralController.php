<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class CentralController extends Controller
{
    public function index()
    {
        return view('central.index');
    }

    public function view()
    {
        return view('central.view');
    }
    public function login(Request $request)
    {
        $client = Client::where('record', '=', $request['record'])->get();
        foreach($client as $data){
           $cpf = $data['record'];
        }
        if($request['record'] == $data['record']){
            echo 'client autorizado';
        }else{
            echo 'client nao autorizado';
        }
    }
}
