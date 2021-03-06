<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;

use App\Model\ActivityType;
use App\Model\Activity;
use App\Model\Board;
use App\Model\Person;
use App\Model\Mark;

use Auth;

class BoardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = DB::table('boards')
            ->join('board_types', 'board_types.id', '=', 'boards.board_type_id')
            ->join('people', 'people.board_id', '=', 'boards.id')
            ->select(
                'boards.*',
                'people.*',
                'board_types.name as type',
                'board_types.image'
            )
            ->where('user_id', Auth::user()->id)
            ->whereNull('boards.deleted_at')
            ->get();
        return view('board.index', compact('boards'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        Log::info('##BRINQUECOIN## [QUADRO SENDO USADO]');

        $board = DB::table('boards')
            ->join(
                'people',
                'people.board_id',
                '=',
                'boards.id'
            )
            ->join(
                'board_types',
                'board_types.id',
                '=',
                'boards.board_type_id'
            )
            ->select(
                'boards.*',
                'people.*',
                'board_types.name as type',
                'board_types.image'
            )
            ->where('boards.code', $code)
            ->first();

        $activities = DB::table('boards')
            ->join(
                'activities',
                'activities.board_id',
                '=',
                'boards.id'
            )
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
            ->LeftJoin(
                'marks',
                'activity_id',
                '=',
                'activities.id'
            )
            ->select(
                'activities.id',
                'activities.value',
                'activity_types.name',
                'propouse_types.icon',
                'propouse_types.name as propouse',
                'marks.monday',
                'marks.tuesday',
                'marks.wednesday',
                'marks.thursday',
                'marks.friday',
                'marks.saturday',
                'marks.sunday'
            )
            ->where('boards.code', '=', $code)
            ->get();

        //Prepare data to view
        $boardVO = $this->getVO(
            $code,
            $board,
            $activities
        );

        return view('board.show', compact('boardVO'));
    }

    /**
     * Mount a value object to prepare data to view
     *
     * @param  string $code
     * @param  object $board
     * @param  list   $activities
     * @return array  $board
     */
    protected function getVO($code, $board, $activities)
    {
        $boardVO = array();
        $boardVO['week'] = array();
        $boardVO['week']['monday'] = "Segunda";
        $boardVO['week']['tuesday'] = "Terça";
        $boardVO['week']['wednesday'] = "Quarta";
        $boardVO['week']['thursday'] = "Quinta";
        $boardVO['week']['friday'] = "Sexta";
        $boardVO['week']['saturday'] = "Sábado";
        $boardVO['week']['sunday'] = "Domingo";
        $boardVO['person']['name'] = $board->name;
        $boardVO['board']['type'] = $board->type;
        $boardVO['board']['goal'] = $board->goal;
        $boardVO['board']['code'] = $board->code;
        $boardVO['activities'] = array();
        foreach ($activities as $activity) {
            $actvt['id'] = $activity->id;
            $actvt['value'] = $activity->value;
            $actvt['name'] = $activity->name;
            $actvt['icon'] = $activity->icon;
            $actvt['propouse'] = $activity->propouse;
            foreach ($boardVO['week'] as $day => $name) {
                if ($activity->$day === 1) {
                    $actvt[$day] = 'img/boards/1.png';
                } elseif ($activity->$day === 2) {
                    $actvt[$day] = 'img/boards/2.png';
                } else {
                    $actvt[$day] = 'img/boards/0.png';
                }
            }
            array_push($boardVO['activities'], $actvt);
        }

        if ($board->type === 'Mesada') {
            $money = null;
            foreach ($boardVO['week'] as $day => $name) {
                $result[$day] = DB::table('boards')
                ->join(
                    'activities',
                    'activities.board_id',
                    '=',
                    'boards.id'
                )
                ->join(
                    'marks',
                    'marks.activity_id',
                    '=',
                    'activities.id'
                )
                ->select(
                    "marks.$day"
                )
                ->where(
                    [
                        ['boards.code', '=', $code],
                        [$day, '=', '1'],
                    ]
                )
                ->sum('activities.value');
                $money = $money + $result[$day];
            }
            $result['partial'] = $money;
        } else {
            // calculate total points of activities' board
            $result['day'] = DB::table('boards')
                ->join(
                    'activities',
                    'activities.board_id',
                    '=',
                    'boards.id'
                )
                ->where('boards.code', $code)
                ->sum('activities.value');
            // caltulate total point of week
            $result['total'] = $result['day'] * 7;
            // calculate parcial points of board
            $points = null;
            foreach ($boardVO['week'] as $day => $name) {
                $result[$day] = DB::table('boards')
                ->join(
                    'activities',
                    'activities.board_id',
                    '=',
                    'boards.id'
                )
                ->join(
                    'marks',
                    'marks.activity_id',
                    '=',
                    'activities.id'
                )
                ->select(
                    "marks.$day"
                )
                ->where(
                    [
                        ['boards.code', '=', $code],
                        [$day, '=', '1'],
                    ]
                )
                ->sum('activities.value');
                $points = $points + $result[$day];
                // set a image of special gift
                if ($result[$day] === $result['day']) {
                    $result[$day] = 'favorite';
                } else {
                    $result[$day] = 'favorite_border';
                }
            }
            $result['partial'] = $points;
        }
        $boardVO['totals'] = $result;
        return $boardVO;
    }

    public function copy($code)
    {
        Log::info('##BRINQUECOIN## [QUADRO DUPLICADO]');

        $board = DB::table('boards')
            ->join(
                'people',
                'people.board_id',
                '=',
                'boards.id'
            )
            ->select(
                'boards.user_id',
                'boards.board_type_id',
                'people.name',
                'people.gender',
                'people.age'
            )
            ->where('boards.code', $code)
            ->first();

        $new_board = Board::create(
            [
                'user_id' => $board->user_id,
                'board_type_id' => $board->board_type_id,
                'code' => Str::uuid()->toString()
            ]
        );

        $person = new Person();
        $person->name = $board->name;
        $person->gender = $board->gender;
        $person->age = $board->age;
        $new_board->person()->save($person);

        $activities = DB::table('boards')
            ->join(
                'activities',
                'activities.board_id',
                '=',
                'boards.id'
            )
            ->select(
                'activities.activity_type_id',
                'activities.value'
            )
            ->where('boards.code', '=', $code)
            ->get();

        foreach ($activities as $activity) {
            Activity::create(
                [
                    'board_id' => $new_board->id,
                    'activity_type_id' => $activity->activity_type_id,
                    'value'=> $activity->value,
                    'code'=> Str::uuid()->toString()
                ]
            );
        }

        toastr('Quadro duplicado!', 'success');
        return back();
    }

    public function close($code)
    {
        Log::info('##BRINQUECOIN## [QUADRO ENCERRADO]');
        if ($code) {
            Board::where('boards.code', $code)->delete();
            toastr('Quadro encerrado!', 'success');
        } else {
            toastr('Código do quadro não identificado!', 'error');
        }
        return back();
    }

    /**
     * Store a newly created activity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeActivity(Request $req)
    {
        $data = $req->validate(
            [
                'activity_type_id' => 'required',
                'value' => 'required',
            ]
        );
        //Generate activity unique id
        $data['code'] = Str::uuid()->toString();
        //Find boards' id
        $data['board_id'] = Board::where(
            'code',
            '=',
            $req->input('code')
        )->firstOrFail()->id;

        Activity::create($data);
        toastr('Atividade incluída no quadro!', 'success');
        return back();
    }

    /**
     * Remove the specified activity from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyActivity($id)
    {
        Activity::find($id)->delete();
        toastr('Atividade removida do quadro!', 'success');
        return back();
    }

    /**
     * Store a newly created activity type in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeActivityType(Request $req)
    {
        $data = $req->validate(
            [
                'propouse_type_id' => 'required',
                'name' => 'required',
            ]
        );
        $data['user_id'] = Auth::user()->id;
        ActivityType::create($data);
        toastr('Atividade personalizada criada!', 'success');
        return back();
    }

    /**
     * Remove the specified activity type from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyActivityType($id)
    {
        $activity_type = ActivityType::find($id)->delete();
        toastr('Atividade personalizada excluída!', 'success');
        return back();
    }
}
