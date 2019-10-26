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
        $list = User::where('id', '<>', $id)->paginate(10);
        return view('users.index', compact('list'));
    }
    public function create()
    {
        return view('auth.register');
    }
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $result = $users->delete();

        if($result){
        return redirect()
                ->route('user.index')
                ->withSuccess('Usuário deletado com sucesso!');
        }else{
            return redirect()
                ->back()
                ->with('error', 'Falha ao excluir');
            }
    }
    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::where('id', '=', $id)->get();
        return view('users.edit', compact('user'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        
        return redirect()
                ->route('user.edit')
                ->with('success', 'Usuário atualizado com sucesso!');
    }
}
