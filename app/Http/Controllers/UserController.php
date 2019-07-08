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
        $list = User::where('id', '<>', $id)->get();
        return view('users.add', compact('list'));
    }
    public function edit($id){
        $idEdit = DB::table('user')->where('id', $id)->get();
        return view::make('register.blade', compact($idEdit));
    }
    public function update($id){
        $idUp = User::where('id', '=', $id);

    }
    public function destroy($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users')->withSuccess('Usuário deletado com sucesso!');
    }
    public function userEdit(){
        $id = auth()->user()->id;
        $user = User::where('id', '=', $id)->get();
        return view('users.edit', compact('user'));

    }

    public function userUpdate(Request $request){
        $data = $request->all();
        $id = auth()->user()->id;
        $user = User::where('id', '=', $id)->get();
        $user->update($data);
        return redirect()->route('users.edit')->withSuccess('Usuário atualizado com sucesso!');
        /*if($data['id'] = $id){
            $user->update($data);
            return redirect()->route('users.edit')->withSuccess('Usuário atualizado com sucesso!');
        }else{
            return redirect()->route('users.edit')->withSuccess('deu merdao!');
        }*/
    }
}
