<?php

namespace App\Http\Controllers\board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;

use App\Model\Board;
use App\Model\Person;
use App\Model\BoardType;
use App\Model\Propouse_Type;

use Auth;

class AllowanceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $board_types = BoardType::all();

        return view(
            'board.allowance.create',
            compact('board_types')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->validate(
            [
                'board_type_id' => 'required',
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric'
            ]
        );
        $data['user_id'] = Auth::user()->id;
        $data['code'] = Str::uuid()->toString();

        $person = new Person();
        $person->name = $data['name'];
        $person->gender = $data['gender'];
        $person->age = $data['age'];

        $board = Board::create($data);
        $board->person()->save($person);

        $notification = array(
            'message' => 'Quadro criado!',
            'alert-type' => 'success'
        );

        return redirect()->route(
            'board.allowance.edit',
            $data['code']
        )->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
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
        return view('board.show', compact('board, activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        if ($code) {
            //Combo de tipos de board
            $board_types = BoardType::all();
            //Combo de propositos
            $propouse_types = Propouse_Type::all();
            //Combo de tipos de atividades
            //Apresenta as atividades padrao e as criadas pelo usuario
            $activity_types = DB::table('activity_types')
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
                ->whereNull('user_id')
                ->orWhere('user_id', Auth::user()->id)
                ->whereNull('activity_types.deleted_at')
                ->get();

            $activities_board = DB::table('activities')
                ->join(
                    'activity_types',
                    'activity_types.id',
                    '=',
                    'activities.activity_type_id'
                )
                ->join(
                    'propouse_types',
                    'propouse_types.id',
                    '=',
                    'activity_types.propouse_type_id'
                )
                ->join(
                    'boards',
                    'boards.id',
                    '=',
                    'activities.board_id'
                )
                ->select(
                    'activities.*',
                    'activity_types.name',
                    'propouse_types.icon'
                )
                ->Where('boards.code', $code)
                ->whereNull('activities.deleted_at')
                ->get();

            //Lista de atividades criadas pelo usuario
            $activities_user = DB::table('activity_types')
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
                ->whereNull('activity_types.deleted_at')
                ->get();

            $board = DB::table('boards')
                ->join('people', 'boards.id', '=', 'people.board_id')
                ->select('boards.*', 'people.*')
                ->where('boards.code', '=', $code)
                ->first();

            return view(
                'board.allowance.edit',
                compact(
                    'board',
                    'board_types',
                    'propouse_types',
                    'activity_types',
                    'activities_board',
                    'activities_user'
                )
            );
        } else {
            $notification = array(
                'message' => 'Código do board não localizado!',
                'alert-type' => 'error'
            );
            return view('board.allowance.edit', $code)->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
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
        $child = new child();
        $child->nome = $dados['name'];
        $child->genero = $dados['gender'];
        $child->idade = $dados['age'];

        $board = Board::create($dados);
        $board->child()->save($hild);

        $notification = array(
            'message' => 'Quadro atualizado!',
            'alert-type' => 'success'
        );
        Board::where('code', '=', $code)->firstOrFail()->update($dados);

        return redirect()->route(
            'board.allowance.edit',
            $dados['codigo']
        )->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        if ($code) {
            Board::where('code', '=', $code)->firstOrFail()->delete();
        } else {
            $notification = array(
                'message' => 'Código do quadro não identificado!',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('board.index')->with($notification);
    }
}
