<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
