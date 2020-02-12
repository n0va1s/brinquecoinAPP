<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BoardType;

class BoardTypeController extends Controller
{
    public function index()
    {
        $registros = BoardType::all();
        return view('board.type.index', compact('registros'));
    }

    public function create()
    {
        return view('board.type.create');
    }

    public function store(Request $req)
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

        BoardType::create($dados);
        toastr('Cadastrado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function edit($id)
    {
        $registro = BoardType::find($id);
        return view('board.type.edit', compact('registro'));
    }

    public function update(Request $req, $id)
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

        BoardType::find($id)->update($dados);
        toastr('Atualizado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function destroy($id)
    {
        BoardType::find($id)->delete();
        toastr('Excluído!', 'success');
        return redirect()->route('board.type.index');
    }
}
