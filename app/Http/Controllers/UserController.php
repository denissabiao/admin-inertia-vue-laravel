<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return Inertia::render('User/List', ['users' => $users]);
    }


    public function create()
    {
        // dd(Session::all());
        return Inertia::render('User/Create');
    }


    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'Já existe um nome com esse cadastro.',
            'email.required' => 'O email é obrigatório.',
            'password.required' => 'A senha é obrigatória.'
        ];

        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required',
            'password' => 'required',
        ], $messages);

        $user = new User;
        $user->fill($request->except('_token'));
        $user->password = Hash::make($user->password);
        $user->save();

        return redirect()->back()->with('success', 'Usuário Cadastrado com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('success', 'Usuário excluido com sucesso.');
    }
}