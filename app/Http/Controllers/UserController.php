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
        $id = auth()->user()->id;
        $list = auth()->user()->get();
        $list = where("user['id'] =='".$id."'");
        dd($list);
        
        return view('users.add', compact('list', 'id'));
    }
}
