<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Models\ServiceOrder;
use App\Models\client;
use App\User;
use Calendar;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $events = [];
        $data = ServiceOrder::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->name,
                    true,
                    new \DateTime($value->dateExec),
                    new \DateTime($value->dateExec.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#3c8dbc',
	                    'url' => route('service.index'),
	                ]
                );

            }
        }
        
        $calendar = Calendar::addEvents($events)->setOptions(['lang' => 'pt-br']);
        $client = Client::all()->count();
        $user = User::all()->count();
        $product = Product::all()->count();
        $orders = ServiceOrder::all()->count();
        return view('home', compact('user', 'client', 'product', 'orders', 'calendar'))->with('success', 'Produto Cadastrado com sucesso!');
    }
}
