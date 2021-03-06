<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use App\Models\client;
use App\Models\ServiceOrder;
use App\Models\Note;
use App\Models\Automobile;
use App\User;
use Nexmo\Laravel\Facade\Nexmo;

class ServiceOrderController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $client = Client::where('status','=', '1')->get();
        $user = User::where('type', '=', 'Mecânico')->get();
        $os = ServiceOrder::where('status', '<>', 'Fechado')->paginate(10);
    
        return view('service.search', compact('client', 'user', 'os'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $client = Client::where('status','=', '1')->get();
        $user = $user = User::where('type', '=', 'Mecânico')->get();
        return view('service.new', compact('client', 'user'));
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
        
        if($insert){
            return redirect()
                    ->route('service.index')
                    ->with('success', 'Ordem de serviço aberta com sucesso!');
        }else{
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao cadastrar!');
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
        $user = User::where('type', '=', 'Mecânico')->get();
        
        return view('service.edit', compact('order', 'client','user'));
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
        $client = Client::find($order['client_id']);

        if($request['statusFin'] == 'Sim'){
            $request['status'] = 'Fechado';
        }
        if($request['status'] != $order['status']){
            $msg = array();
            $msg['id'] = $client['id'];
            $msg['num'] = $client['phoneP'];
            $msg['msg'] = ('Sua ordem de servico foi atualizada, status no momento ' . $request['status'] . '.');
                
            $result = Nexmo::message()->send([
                'to'   => $msg['num'],
                'from' => '16105552344',
                'text' => $msg['msg'],
            ]);
        }
        $not['note'] = $request['descriptionSer'];
        unset($request['statusFin']);
        unset($request['descriptionSer']);
        $not['service_id'] = $id;
        $note->create($not);
        $result = $order->update($request->all());
        
        if($result){
            return redirect()
                    ->route('service.index')
                    ->with('success', 'Ordem de serviço atualizada com sucesso!');
        }else{
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar!');
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
        $os = ServiceOrder::where('name', 'like', '%'.$request['name'].'%')
                    ->Orwhere('responsible', 'like', '%'.$request['responsible'].'%')
                    ->Orwhere('service', 'like', '%'.$request['service'].'%')
                    ->Orwhere('protocol', 'like', '%'.$request['protocol'].'%')->paginate(10);

        $result = $os;
        
        if($result){
            return view('service.search', compact('os'));
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
        $list = Note::where('service_id', '=', $id)->get();
        return view('client.notes', compact('list', 'note'));
    }

    public function getAuto($id)
    {
       $auto = Automobile::where('client', '=', $id)->getQuery()->get(['id', 'brand']);

        return $auto;
        //return Response::json($auto);
    }

    public function view($id)
    {   
        $order = ServiceOrder::where('id', '=', $id)->get();
        return view('service.view', compact('order'));
    }
    public function pdf($id)
    {
        $client = Client::where('id', '=', $id)->get();
        $order = ServiceOrder::where('client_id', '=', $id)->get();
        return \PDF::loadView('service.pdf', compact('order', 'client'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
          ->download('ordem.pdf');
    }
}
