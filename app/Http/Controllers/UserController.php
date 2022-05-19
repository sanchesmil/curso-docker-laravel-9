<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (Request $request){

        // Captura o valor inserido no campo de pesquisa (independente se existir ou não)
        $search = $request->search;

        // CRIA UM FILTRO para pesquisar os usuarios pelo email ou pelo nome        
        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email',$search);
                $query->orWhere('name','LIKE',"%{$search}%");
            }
        })->get();

        return view('users.index', compact('users'));
    }

    public function show($id){

        //$user = User::where('id', $id)->first(); // ou
        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }
        //dd($user);
        return view ('users.show', compact('user'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        // Obtem os dados e criptografa a senha antes de inserir no banco
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function edit($id){
        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id){
        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }

        $data = $request->only('name','email');

        if($request->password){
            $data['password'] = bcrypt($request->password);
         }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id){

        if(!$user = User::find($id)){
            return redirect()->route('users.index');
        }
        
        $user->delete();

        return redirect()->route('users.index');
    }
}
