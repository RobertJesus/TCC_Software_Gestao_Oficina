<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\MechanicalController;
use App\Models\Mechanical;

class MechanicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('mechanical.new');
    }

    public function create(){
        return view('mechanical.new');
    }

    public function store(Request $request, Mechanical $mechanical)
    {

        $result = $mechanical->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($result){
            return view('mechanical.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
    }
}
