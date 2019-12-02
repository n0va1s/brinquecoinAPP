<?php

namespace App\Http\Controllers\board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;

use App\Model\board;
use App\Model\child;
use App\Model\Board_Type;
use App\Model\Propouse_Type;

use Auth;

class TaskController extends Controller
{
    public function index()
    {
        $registros = DB::table('boards')
            ->join('child', 'boards.id', '=', 'child.board_id')
            ->join('board_types', 'board_types.id', '=', 'boards.board_type_id')
            ->select(
                'boards.*',
                'child.name',
                'child.age',
                'child.gender',
                'board_types.name',
                'board_types.image'
            )
            ->get();
        return view('board.task.index', compact('registros'));
    }

    public function create()
    {
        $tiposQuadros = Board_Type::all();
        $tiposPropositos = Propouse_Type::all();
        $tiposAtividades = DB::table('activity_types')
            ->join(
                'propouse_types',
                'propouse_types.id',
                '=',
                'activity_types.propouse_type_id'
            )
            ->select(
                'activity_types.id',
                'propouse_types.name AS propouse',
                'activity_types.name AS activity'
            )
            ->get();
        return view(
            'new.task.board',
            compact(
                'tiposQuadros',
                'tiposAtividades',
                'tiposPropositos'
            )
        );
    }

    public function store(Request $req)
    {
        $dados = $req->validate(
            [
                'board_type_id' => 'required',
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric',
                'reward' => Rule::requiredIf($req->get('board_type_id') === "4")
            ]
        );
        $dados['user_id'] = Auth::user()->id;
        $dados['code'] = Str::uuid()->toString();

        $child = new child();
        $child->nome = $dados['name'];
        $child->genero = $dados['gender'];
        $child->idade = $dados['age'];

        $board = board::create($dados);
        $board->child()->save($child);

        $notification = array(
            'message' => 'Quadro criado!',
            'alert-type' => 'success'
        );

        return redirect()->route(
            'board.task.edit',
            $dados['code']
        )->with($notification);
    }

    public function edit($code)
    {
        if ($code) {
            //Combo de tipos de board
            $tiposQuadros = Board_Type::all();
            //Combo de propositos
            $tiposPropositos = Propouse_Type::all();
            //Combo de tipos de atividades
            //Apresenta as atividades padrao e as criadas pelo usuario
            $tiposAtividades = DB::table('tipo_atividades')
                ->join(
                    'propouse_types',
                    'propouse_types.id',
                    '=',
                    'activity_types.propouse_type_id'
                )
                ->select(
                    'activity_types.id',
                    'propouse_types.descricao AS des_proposito',
                    'activity_types.descricao AS des_atividade'
                )
                ->whereNull('user_id')
                ->orWhere('user_id', Auth::user()->id)
                ->get();

            $activitiesBoard = DB::table('atividades')
                ->join(
                    'tipo_atividades',
                    'activity_types.id',
                    '=',
                    'activities.tipo_atividade_id'
                )
                ->join(
                    'propouse_types',
                    'propouse_types.id',
                    '=',
                    'activity_types.propouse_type_id'
                )
                ->join(
                    'quadros',
                    'boards.id',
                    '=',
                    'activities.quadro_id'
                )
                ->select(
                    'activities.*',
                    'activity_types.descricao',
                    'propouse_types.icone'
                )
                ->Where('boards.code', $code)
                ->get();

            //Lista de atividades criadas pelo usuario
            $activitiesUser = DB::table('tipo_atividades')
                ->join(
                    'propouse_types',
                    'propouse_types.id',
                    '=',
                    'activity_types.propouse_type_id'
                )
                ->select(
                    'activity_types.id',
                    'propouse_types.name AS propouse',
                    'activity_types.name',
                    'propouse_types.icon'
                )
                ->Where('user_id', Auth::user()->id)
                ->get();

            $registro = DB::table('boards')
                ->join('child', 'boards.id', '=', 'child.quadro_id')
                ->select('boards.*', 'child.*')
                ->where('boards.code', '=', $code)
                ->first();

            return view(
                'board.task.edit',
                compact(
                    'registro',
                    'tiposQuadros',
                    'tiposPropositos',
                    'tiposAtividades',
                    'activitiesBoard',
                    'activitiesUser'
                )
            );
        } else {
            $notification = array(
                'message' => 'Código do board não localizado!',
                'alert-type' => 'error'
            );
            return view('board.task.edit')->with($notification);
        }
    }

    public function update(Request $req, $code)
    {
        $dados = $req->validate(
            [
                'board_type_id' => 'required',
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric',
                'reward' => Rule::requiredIf($req->get('board_type_id') === "4")
            ]
        );
        $dados['user_id'] = Auth::user()->id;
        dd($dados);
        $child = new child();
        $child->nome = $dados['name'];
        $child->genero = $dados['gender'];
        $child->idade = $dados['age'];

        $board = board::create($dados);
        $board->child()->save($hild);

        $notification = array(
            'message' => 'Quadro atualizado!',
            'alert-type' => 'success'
        );
        board::where('code', '=', $code)->firstOrFail()->update($dados);

        return redirect()->route('board.task.create')->with($notification);
    }

    public function destroy($code)
    {
        if ($code) {
            board::where('code', '=', $code)->firstOrFail()->delete();
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('board.index')->with($notification);
    }

    public function show($code)
    {
        if ($code) {
            $board = DB::table('boards')
                ->join('child', 'board.id', '=', 'child.board_id')
                ->join(
                    'board_types',
                    'board_types.id',
                    '=',
                    'boards.tipo_quadro_id'
                )
                ->select(
                    'boards.*',
                    'child.name',
                    'child.age',
                    'child.gender',
                    'board_types.name',
                    'board_types.image'
                )
                ->where('boards.code', '=', $code)
                ->get();
            $activities = DB::table('boards')
                ->join('activities', 'activities.quadro_id', '=', 'boards.id')
                ->join(
                    'activities_type',
                    'activities.board_type_id',
                    '=',
                    'activities_type.id'
                )
                ->select('activities.*', 'activities_type.descricao')
                ->where('boards.code', '=', $code)
                ->get();
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }

        return view('board.show', compact('board'));
    }

    public function duplicar($code)
    {
        //TODO: duplicar o quadro e as atividades (sem marcacao)
    }

    public function encerrar($code)
    {
        if ($code) {
            $resultado = DB::table('boards')
                ->where('boards.code', $code)
                ->update(['active' => 'N']);

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
