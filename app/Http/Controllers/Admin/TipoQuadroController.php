<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TipoQuadro;

class TipoQuadroController extends Controller
{
    public function index()
    {
        $registros = TipoQuadro::all();
        return view('admin.configuracao.tiposquadros.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.configuracao.tiposquadros.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->all();

        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/tiposquadros/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }

        TipoQuadro::create($dados);

        return redirect()->route('admin.configuracao.tiposquadros');
    }

    public function editar($id)
    {
        $registro = TipoQuadro::find($id);
        return view('admin.configuracao.tiposquadros.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/tiposquadros/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }

        TipoQuadro::find($id)->update($dados);

        return redirect()->route('admin.configuracao.tiposquadros');
    }

    public function deletar($id)
    {
        TipoQuadro::find($id)->delete();
        return redirect()->route('admin.configuracao.tiposquadros');
    }
}
