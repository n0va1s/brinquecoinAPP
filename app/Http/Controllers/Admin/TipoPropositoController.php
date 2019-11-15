<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoProposito;

class TipoPropositoController extends Controller
{
    public function index()
    {
        $registros = TipoProposito::all();
        return view('admin.configuracao.tipospropositos.index', compact('registros'));
    }

    public function adicionar()
    {

        return view('admin.configuracao.tipospropositos.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        TipoProposito::create($dados);
        return redirect()->route('admin.configuracao.tipospropositos');
    }

    public function editar($id)
    {
        $registro = TipoProposito::find($id);
        return view('admin.configuracao.tipospropositos.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        TipoProposito::find($id)->update($dados);
        return redirect()->route('admin.configuracao.tipospropositos');
    }

    public function deletar($id)
    {
        TipoProposito::find($id)->delete();
        return redirect()->route('admin.configuracao.tipospropositos');
    }
}
