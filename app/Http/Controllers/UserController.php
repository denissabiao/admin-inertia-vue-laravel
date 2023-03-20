<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::all();

        return Inertia::render('User/List', ['users' => $users]);
    }


    public function create()
    {
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

        $this->user->fill($request->except('_token'));
        $this->user->password = Hash::make($this->user->password);
        $this->user->save();

        return redirect()->back()->with('success', 'Usuário Cadastrado com Sucesso');
    }


    public function show(User $id)
    {

        $user = $this->user->find($id);

        return Inertia::render('User/Edit', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }


    public function update(Request $request)
    {
        $messages = [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'Já existe um nome com esse cadastro.',
            'email.required' => 'O email é obrigatório.',
        ];

        $request->validate([
            'name' => 'required|unique:users,name,' . $request->input('id') ,
            'email' => 'required|unique:users,email,'.$request->input('id'),
        ], $messages);

        if ($request->input('password')) {
            $this->user->password = Hash::make($this->user->password);
        }

        $this->user->find($request->input('id'))->update($request->except('_token', 'password'));

        return redirect()->back()->with('success', 'Usuário alterado com sucesso.');
    }


    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('success', 'Usuário excluido com sucesso.');
    }
}