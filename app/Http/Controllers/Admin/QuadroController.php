<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Quadro;
use App\Crianca;
use App\TipoQuadro;
use App\TipoAtividade;
use App\TipoProposito;

use Auth;

class QuadroController extends Controller
{
    public function index()
    {
        $registros = DB::table('quadros')
            ->join('criancas', 'quadros.id', '=', 'criancas.quadro_id')
            ->join('tipo_quadros', 'tipo_quadros.id', '=', 'quadros.tipo_quadro_id')
            ->select('quadros.*', 'criancas.nome', 'criancas.idade', 'criancas.genero', 'tipo_quadros.descricao', 'tipo_quadros.imagem')
            ->get();
        return view('admin.quadros.index', compact('registros'));
    }

    public function adicionar()
    {
        $tiposQuadros = TipoQuadro::all();
        $tiposPropositos = TipoProposito::all();
        $tiposAtividades = DB::table('tipo_atividades')
            ->join('tipo_propositos', 'tipo_propositos.id', '=', 'tipo_atividades.tipo_proposito_id')
            ->select(
                'tipo_atividades.id',
                'tipo_propositos.descricao AS des_proposito',
                'tipo_atividades.descricao AS des_atividade'
            )
            ->get();
        return view('admin.quadros.adicionar', compact('tiposQuadros', 'tiposAtividades', 'tiposPropositos'));
    }

    public function salvar(Request $req)
    {
        $dados = $req->validate([
            'tipo_quadro_id' => 'required',
            'nome' => 'required|max:200',
            'genero' => 'required',
            'idade' => 'required|numeric'
        ]);
        $dados['user_id'] = Auth::user()->id;
        $dados['codigo'] = Str::uuid()->toString();

        $crianca = new Crianca();
        $crianca->nome = $dados['nome'];
        $crianca->genero = $dados['genero'];
        $crianca->idade = $dados['idade'];

        $quadro = Quadro::create($dados);
        $quadro->crianca()->save($crianca);

        $notification = array(
            'message' => 'Quadros criado!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.quadros.adicionar')->with($notification);
    }

    public function editar($codigo)
    {
        if ($codigo) {
            $tiposQuadros = TipoQuadro::all();
            $tiposPropositos = TipoProposito::all();
            $tiposAtividades = DB::table('tipo_atividades')
                ->join('tipo_propositos', 'tipo_propositos.id', '=', 'tipo_atividades.tipo_proposito_id')
                ->select(
                    'tipo_atividades.id',
                    'tipo_propositos.descricao AS des_proposito',
                    'tipo_atividades.descricao AS des_atividade'
                )
                ->get();
            //$registro = Quadro::find($id);
            $registro = DB::table('quadros')
                ->join('criancas', 'quadros.id', '=', 'criancas.quadro_id')
                ->select('quadros.*', 'criancas.*')
                ->where('quadro.codigo', '=', $codigo)
                ->get();

            $notification = array(
                'message' => 'Quadros atualizado!',
                'alert-type' => 'success'
            );

            //$registro = Quadro::where('codigo', '=', $codigo)->firstOrFail();
            return view('admin.quadros.editar', compact('registro', 'tiposQuadros', 'tiposPropositos', 'tiposAtividades'));
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
            return view('admin.quadros')->with($notification);
        }
    }

    public function atualizar(Request $req, $codigo)
    {
        $dados = $req->validate([
            'tipo_quadro_id' => 'required',
            'nome' => 'required|max:200',
            'genero' => 'required',
            'idade' => 'required|numeric'
        ]);
        $dados['user_id'] = Auth::user()->id;
        $dados['codigo'] = Str::uuid()->toString();

        $crianca = new Crianca();
        $crianca->nome = $dados['nome'];
        $crianca->genero = $dados['genero'];
        $crianca->idade = $dados['idade'];

        $quadro = Quadro::create($dados);
        $quadro->crianca()->save($crianca);

        $notification = array(
            'message' => 'Quadros atualizado!',
            'alert-type' => 'success'
        );
        Quadro::where('codigo', '=', $codigo)->firstOrFail()->update($dados);

        return redirect()->route('admin.quadros.adicionar')->with($notification);
    }

    public function deletar($codigo)
    {
        if ($codigo) {
            Quadro::where('codigo', '=', $codigo)->firstOrFail()->delete();
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('admin.quadros')->with($notification);
    }

    public function exibir($codigo)
    {
        if ($codigo) {
            $quadro = DB::table('quadros')
                ->join('criancas', 'quadros.id', '=', 'criancas.quadro_id')
                ->join('tipo_quadros', 'tipo_quadros.id', '=', 'quadros.tipo_quadro_id')
                ->select('quadros.*', 'criancas.nome', 'criancas.idade', 'criancas.genero', 'tipo_quadros.descricao', 'tipo_quadros.imagem')
                ->where('quadro.codigo', '=', $codigo)
                ->get();
            $atividades = DB::table('quadros')
                ->join('atividades', 'atividades.quadro_id', '=', 'quadros.id')
                ->join('tipo_atividades', 'atividades.tipo_quadro_id', '=', 'tipo_atividades.id')
                ->select('atividades.*', 'tipo_atividades.descricao')
                ->where('quadro.codigo', '=', $codigo)
                ->get();
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }

        return view('admin.quadros.exibir', compact('quadro'));
    }

    public function duplicar($codigo)
    {
        //TODO: duplicar o quadro e as atividades (sem marcacao)
    }

    public function encerrar($codigo)
    {
        if ($codigo) {
            $resultado = DB::table('quadros')
                ->where('codigo', $codigo)
                ->update(['ativo' => 'N']);

            $notification = array(
                'message' => 'Quadro encerrado!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }
    }
}
