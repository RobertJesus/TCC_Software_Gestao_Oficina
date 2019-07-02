<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\user;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $list = auth()->user()->get();
        return view('users.add', compact('list'));
    }
}
