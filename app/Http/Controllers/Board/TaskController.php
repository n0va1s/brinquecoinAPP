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
use App\Model\PropouseType;

use Auth;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.task.create');
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
                'age' => 'required|numeric',
                'goal' => Rule::requiredIf($req->get('board_type_id') === "4")
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
            'board.task.edit',
            $data['code']
        )->with($notification);
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
            //Combo de propositos
            $propouse_types = DB::table('propouse_types')
                ->select('propouse_types.*')
                ->orderBy('propouse_types.name', 'asc')
                ->get();

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
                ->orderby('propouse_types.name', 'asc')
                ->orderby('activity_types.name', 'asc')
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
                'board.task.edit',
                compact(
                    'board',
                    'propouse_types',
                    'activity_types',
                    'activities_board',
                    'activities_user'
                )
            );
        } else {
            $notification = array(
                'message' => 'Código do quadro não localizado!',
                'alert-type' => 'error'
            );
            return view('board.task.edit', $code)->with($notification);
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
        $data = $req->validate(
            [
                'board_type_id' => 'required',
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric',
                'goal' => Rule::requiredIf($req->get('board_type_id') === "4")
            ]
        );
        $data['user_id'] = Auth::user()->id;
        $board = Board::where('code', '=', $code);
        if ($board) {
            $board->name = $data['name'];
            $board->gender = $data['gender'];
            $board->age = $data['age'];

            $board->save();

            $notification = array(
            'message' => 'Quadro atualizado!',
            'alert-type' => 'success');
        } else {
            $notification = array(
                'message' => 'Quadro não encontrado!',
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
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
