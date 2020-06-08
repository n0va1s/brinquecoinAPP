<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use App\Notifications\NewBoard;

use App\Model\Board;
use App\Model\Person;
use App\Model\BoardType;
use App\Model\PropouseType;

use Auth;

class AllowanceController extends Controller
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
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.allowance.create');
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
        toastr('Quadro criado!', 'success');

        // Send board link
        $req->user()->notify(
            new NewBoard(
                route('board.show', $data['code']),
                'mesada',
                Auth::user()->name
            )
        );
        
        toastr('Email enviado com os dados do seu quadro', 'info');
        return redirect()->route('board.allowance.edit', $data['code']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        if (!isset($code)) {
            toastr('O código do quadro é obrigatório. Favor verificar', 'error');
            return back();
        }
        //Combo de propositos
        $propouse_types = DB::table('propouse_types')
            ->select('propouse_types.*')
            ->orderBy('propouse_types.name', 'asc')
            ->where('propouse_types.propouse', '<>', 'H')
            ->whereNull('propouse_types.deleted_at')
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
            ->where('propouse_types.propouse', '<>', 'H')
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
            ->whereNull('boards.deleted_at')
            ->first();

        return view(
            'board.allowance.edit',
            compact(
                'board',
                'propouse_types',
                'activity_types',
                'activities_board',
                'activities_user'
            )
        );
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
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric'
            ]
        );
        $board = Board::where('code', $code)->first();
        if (!isset($board)) {
            toastr('Quadro não encontrado. Favor verificar', 'error');
            return back();
        }
        $person = Person::find($board->id);
        $person->name = $data['name'];
        $person->gender = $data['gender'];
        $person->age = $data['age'];
        $board->person()->save($person);
        toastr('Quadro atualizado!', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $deleted = Board::where('code', '=', $code)->firstOrFail()->delete();
        if ($deleted === 0) {
            toastr('Quadro não encontrado. Favor verificar', 'error');
        }
        return redirect()->route('board.index');
    }
}
