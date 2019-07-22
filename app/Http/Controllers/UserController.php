<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;
use App\Auth;
use App\user;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = auth()->user()->id;
        $list = User::where('id', '<>', $id)->get();
        return view('users.add', compact('list'));
    }
    public function indexx()
    {
        return view('users.new');
    }
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users')->withSuccess('Usuário deletado com sucesso!');
    }
    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::where('id', '=', $id)->get();
        return view('users.edit', compact('user'));

    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = hash::make($request->password);
        $user->save();
        
        return redirect()->route('edit')->withSuccess('Usuário atualizado com sucesso!');
    }
}
