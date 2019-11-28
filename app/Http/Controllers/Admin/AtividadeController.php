<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Quadro;
use App\Atividade;
use App\TipoAtividade;

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
            ->select('tipo_propositos.descricao', 'tipo_atividades.descricao')
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

        return redirect()->route('admin.quadros.editar', $quadro->codigo);
    }

    public function editar($codigo)
    {
        $tiposQuadros = TipoQuadro::all();
        $tiposPropositos = TipoProposito::all();
        $tiposAtividades = DB::table('tipo_atividades')
            ->join('tipo_propositos', 'tipo_propositos.id', '=', 'tipo_atividades.tipo_proposito_id')
            ->select('tipo_atividades.id', 'tipo_propositos.descricao', 'tipo_atividades.descricao')
            ->get();
        //$registro = Quadro::find($id);
        $registro = DB::table('quadros')
            ->join('criancas', 'quadros.id', '=', 'criancas.quadro_id')
            ->select('quadros.*', 'criancas.*')
            ->where('codigo', '=', $codigo)
            ->get();
        //$registro = Quadro::where('codigo', '=', $codigo)->firstOrFail();
        return view('admin.quadros.editar', compact('registro', 'tiposQuadros', 'tiposPropositos', 'tiposAtividades'));
    }

    public function atualizar(Request $req, $codigo)
    {
        $dados = $req->validate([
            'tipo_quadro_id' => 'required',
            'nome' => 'required|max:200',
            'genero' => 'required',
            'idade' => 'required|numeric'
        ]);

        //Quadro::find($id)->update($dados);
        Quadro::where('codigo', '=', $codigo)->firstOrFail()->update($dados);
        return redirect()->route('admin.quadros');
    }

    public function deletar($codigo)
    {
        Quadro::where('codigo', '=', $codigo)->firstOrFail()->delete();
        return redirect()->route('admin.quadros');
    }

    public function configurar(Request $req, $codigo)
    {
        /*
        Esse metodo cria uma nova atividade na tabela de configuracao.
        Essa atividade é associada a um usuario, permitindo que apareca
        no cadastro de quadro, na selecao de atividades
        */
        if ($codigo) {
            $quadro = Quadro::where('codigo', '=', $codigo)->firstOrFail();
            if ($quadro) {
                $dados = $req->validate([
                    'tipo_proposito_id' => 'required',
                    'descricao' => 'required',
                    'imagem' => 'required'
                ]);
                $dados['user_id'] = Auth::user()->id;

                TipoAtividade::create($dados);

                $notification = array(
                    'message' => 'Nova atividade criada! Associe ela ao seu quadro',
                    'alert-type' => 'success'
                );

                return redirect()->route('admin.quadros.adicionar')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Quadro não localidado',
                    'alert-type' => 'error'
                );
            }
        } else {
            $notification = array(
                'message' => 'Código do quadro não localizado!',
                'alert-type' => 'error'
            );
        }
    }
}
