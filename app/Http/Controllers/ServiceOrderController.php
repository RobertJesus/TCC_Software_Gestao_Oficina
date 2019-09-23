<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ServiceOrder;
use App\Models\Note;
use App\User;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $client = Client::all();
        $user = User::all();
        return view('service.search', compact('client', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $client = Client::all();
        return view('service.new', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceOrder $serviceOrder)
    {
        $id = Client::where('name','=', $request['name'])->get('id');
        foreach ($id as $data){
            $cli = $data['id'];
        }
        $request['client_id'] = $cli;
        
        $insert = $serviceOrder->create($request->all());
        //$id['id'] = $insert['id'];
        
        if($insert){
            return view('service.new')
                    ->with('success', 'Usuário Cadastrado com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }
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
        $order = ServiceOrder::where('id', '=', $id)->get();
        $client = Client::all();
        
        return view('service.edit', compact('order', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Note $note)
    {
        $order = ServiceOrder::find($id);
        

        if($request['statusFin'] = 'Sim'){
            $request['status'] = 'Fechado';
            $desc['note'] = $request['descriptionSer'];
            unset($request['statusFin']);
            unset($request['descriptionSer']);
            $not = $desc;
            $not['service_id'] = $id;
            $note->create($not);
            $result = $order->update($request->all());
                if($result){
                    return redirect()
                            ->route('client.index')
                            ->with('success', 'Ordem de serviço finalizada com sucesso!');
                }else{
                    return redirect()
                            ->back()
                            ->with('error', 'Falha ao atualizar!');
                }
        }else{
            return $request;
            exit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {   
        $list = ServiceOrder::where('name', 'like', '%'.$request['name'].'%')
                    ->Orwhere('responsible', 'like', '%'.$request['responsible'].'%')
                    ->Orwhere('protocol', 'like', '%'.$request['protocol'].'%')->get();

        $result = $list;
        
        if($result){
            return view('service.search', compact('list'));
        }else{
            return redirect()
                    ->route('search')
                    ->with('error', 'Não foi possivel encontrar registro');
        }
    }

    public function orders(Request $request)
    {
        $list = ServiceOrder::where('status','=', $request['status'])
                    ->Orwhere('protocol', '=', $request['protocol'])->get();
        return view('client.order', compact('list'));
    }

    public function notes($id)
    {
        $note = ServiceOrder::where('id', '=', $id)->get();
        
        foreach($note as $data){
            $result = $data->Observacoes;
        }
        return $result;
        exit();
        return view('client.notes', compact('list'));
    }
}
