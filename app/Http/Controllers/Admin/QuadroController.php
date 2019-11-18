<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quadro;
use App\TipoQuadro;
use App\TipoAtividade;
use App\TipoProposito;

class QuadroController extends Controller
{
    public function index()
    {
        $registros = Quadro::all();
        return view('admin.quadros.index', compact('registros'));
    }

    public function adicionar()
    {
        $tiposQuadros = TipoQuadro::all();
        $tiposAtividades = TipoAtividade::all();
        $tiposPropositos = TipoProposito::all();
        return view('admin.quadros.adicionar', compact('tiposQuadros', 'tiposAtividades', 'tiposPropositos'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->validate([
            'nomeDe' => 'required|max:200',
            'nomePara' => 'required|max:200',
            'emailPara' => 'required|email',
            'avisadoEm' => 'required|date',
            'mensagem' => 'required',
        ]);
        $dados['user_id'] = Auth::user()->id;
        $dados['codigo'] = Str::uuid()->toString();

        Quadro::create($dados);
        return redirect()->route('admin.quadros');
    }

    public function editar($id)
    {
        $registro = Quadro::find($id);
        return view('admin.quadros.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->validate([
            'nomeDe' => 'required|max:200',
            'nomePara' => 'required|max:200',
            'emailPara' => 'required|email',
            'avisadoEm' => 'required|date',
            'mensagem' => 'required',
        ]);

        Quadro::find($id)->update($dados);
        return redirect()->route('admin.quadros');
    }

    public function deletar($codigo)
    {
        Quadro::where('codigo', '=', $codigo)->firstOrFail()->delete();
        return redirect()->route('admin.quadros');
    }

    public function exibir($id)
    {
        $registro = Quadro::find($id);
        return view('admin.quadros.exibir', compact('registro'));
    }
}
