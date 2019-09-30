<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Models\ServiceOrder;
use App\Models\Client;
use App\User;
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
    {   $client = Client::all()->count();
        $user = User::all()->count();
        $product = Product::all()->count();
        $orders = ServiceOrder::all()->count();
        return view('home', compact('user', 'client', 'product', 'orders'))->with('success', 'Produto Cadastrado com sucesso!');
    }
}
