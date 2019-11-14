<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoAtividade;
use App\TipoQuadro;
use App\TipoProposito;

class TipoAtividadeController extends Controller
{
    public function index()
    {
        $registros = TipoAtividade::all();
        return view('admin.configuracao.tiposatividades.index', compact('registros'));
    }

    public function adicionar()
    {

        $tiposQuadros = TipoQuadro::all();
        $tiposPropositos = TipoProposito::all();
        return view('admin.configuracao.tiposatividades.adicionar', compact('tiposQuadros', 'tiposPropositos'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();
        TipoAtividade::create($dados);
        return redirect()->route('admin.configuracao.tiposatividades');
    }

    public function editar($id)
    {
        $registro = TipoAtividade::find($id);
        return view('admin.configuracao.tiposatividades.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();
        TipoAtividade::find($id)->update($dados);
        return redirect()->route('admin.configuracao.tiposatividades');
    }

    public function deletar($id)
    {
        TipoAtividade::find($id)->delete();
        return redirect()->route('admin.configuracao.tiposatividades');
    }
}
