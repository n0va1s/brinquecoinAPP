<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $registro = User::find($id);
        return view('profile.edit', compact('registro'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->validate(
            [
            'name' => 'required|max:255',
            'email' => 'required|max:100',
            'password' => 'required',
            ]
        );
        $dados['password'] = md5($dados['password']);
        User::find($id)->update($dados);

        $notification = array(
            'message' => 'Perfil atualizado!',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.edit', $id)
        ->with($notification);
    }
}
