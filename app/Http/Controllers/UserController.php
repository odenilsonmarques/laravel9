<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()//funcao para listar os usuarios
    {
        $users = User::all();
        return view('users.index',['users' => $users]);
        //outra forma de exibir os dados
        // return view('users.index',compact('users'));
    }
    public function show($id) //funcao para listar os detalhes de cada usuario
    {
        $user = User::find($id);//recuperarando os dados do usuario
        if(!$user){
            return redirect()->route('users.index');
        }
        return view('users.show', compact('user'));
        // dd('users.show', $user);
        // dd('UserController@index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function createAction(CreateUpdateUserFormRequest $request)//ao inves de passar o Request, passei a classe StoreUpdateUserFormRequest (App\Http\Requests\CreateUpdateUserFormRequest), pois nela ja foi inserido as regras de validações
    {
        // dd($request->all());

        //como a senha é criptografa deve-se informa o tipo de criptografa antes de persistir os dadod
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data); //usando o metodo create

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = User::find($id);//recuperarando o usuario
        if(!$user){
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }

    public function update(CreateUpdateUserFormRequest $request, $id)
    {
        // $user = User::find($id);//recuperarando o usuario
        if(!$user = User::find($id))
            return redirect()->route('users.index');
            // dd($request->all());
        
         $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

            $user->update($data);
            return redirect()->route('users.index');
            // dd($request->all());
    }

    

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');

    }
}
