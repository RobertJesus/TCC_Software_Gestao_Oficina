<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Models\ServiceOrder;
use App\Models\client;
use App\Models\Event;
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
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                    'url' => 'pass here url and any route',
	                ]
                );

            }
        }
        
        $calendar = Calendar::addEvents($events);
        $client = Client::all()->count();
        $user = User::all()->count();
        $product = Product::all()->count();
        $orders = ServiceOrder::all()->count();
        return view('home', compact('user', 'client', 'product', 'orders', 'calendar'))->with('success', 'Produto Cadastrado com sucesso!');
    }
}
