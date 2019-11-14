<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class PerfilController extends Controller
{
    public function index($id)
    {
        $registro = User::find($id);
        return view('admin.perfil.index', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:100',
            'password' => 'required',
        ]);
        $dados['password'] = md5($dados['password']);
        User::find($id)->update($dados);
        return redirect()->route('admin.perfil', $id)
        ->with('success', 'Dados atualizados!');
    }
}
