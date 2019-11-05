<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quadro;

class QuadroController extends Controller
{
    public function index()
    {
      $registros = Quadro::all();
      return view('admin.quadros.index',compact('registros'));
    }
    public function adicionar()
    {
      return view('admin.quadros.adicionar');
    }
    public function salvar(Request $req)
    {
      $dados = $req->all();

      if(isset($dados['publicado'])){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = "img/quadros/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
      }

      Quadro::create($dados);

      return redirect()->route('admin.quadros');

    }

    public function editar($id)
    {
      $registro = Quadro::find($id);
      return view('admin.quadros.editar',compact('registro'));
    }
    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      if(isset($dados['publicado'])){
        $dados['publicado'] = 'sim';
      }else{
        $dados['publicado'] = 'nao';
      }

      if($req->hasFile('imagem')){
        $imagem = $req->file('imagem');
        $num = rand(1111,9999);
        $dir = "img/quadros/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
      }

      Quadro::find($id)->update($dados);

      return redirect()->route('admin.quadros');

    }

    public function deletar($id)
    {
      Quadro::find($id)->delete();
      return redirect()->route('admin.quadros');
    }

}
