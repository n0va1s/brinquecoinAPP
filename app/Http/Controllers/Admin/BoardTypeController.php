<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardTypeRequest;
use App\Model\BoardType;

use Illuminate\Support\Facades\Log;

use Auth;

class BoardTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $registros = BoardType::all();
        return view('configuration.tiposquadros.index', compact('registros'));
    }

    public function create()
    {
        return view('configuration.tiposquadros.adicionar');
    }

    public function store(BoardTypeRequest $req)
    {
        Log::info('##BRINQUECOIN## [NOVO TIPO DE QUADRO]');
        $dados = $req->validated();
        if ($req->hasFile('image')) {
            $imagem = $req->file('image');
            $num = rand(1111, 9999);
            $dir = "img/tiposquadros/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['image'] = $dir . "/" . $nomeImagem;
        }

        BoardType::create($dados);
        toastr('Cadastrado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function edit($id)
    {
        $registro = BoardType::find($id);
        return view('configuration.tiposquadros.editar', compact('registro'));
    }

    public function update(BoardTypeRequest $req, $id)
    {
        $dados = $req->validated();
        if ($req->hasFile('image')) {
            $imagem = $req->file('image');
            $num = rand(1111, 9999);
            $dir = "img/tiposquadros/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['image'] = $dir . "/" . $nomeImagem;
        }

        BoardType::find($id)->update($dados);
        toastr('Atualizado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function destroy($id)
    {
        Log::info('##BRINQUECOIN## [EXCLUSAO DE TIPO DE QUADRO]');
        BoardType::find($id)->delete();
        toastr('Excluído!', 'success');
        return redirect()->route('board.type.index');
    }
}
