<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Model\ActivityType;
use App\Model\Activity;
use App\Model\Board;

use Auth;

class BoardController extends Controller
{
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
                'board_types.name',
                'board_types.image'
            )
            ->where('active', 'Y')
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
            ->where('boards.active', 'Y')
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
                'activities.id'
            )
            ->join(
                'propouse_types',
                'propouse_types.id',
                '=',
                'activity_types.propouse_type_id'
            )
            ->leftJoin(
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
        $boardAllowance = $this->getVO(
            $code,
            $board,
            $activities
        );
        
        return view('board.show', compact('boardAllowance'));
    }

    /**
     * Mount a value object to prepare data to view
     *
     * @param  string $code
     * @param  object $board
     * @param  list   $activities
     * @return array  $boardAllowance
     */
    protected function getVO($code, $board, $activities)
    {
        $boardAllowance = array();
        $boardAllowance['week'] = array();
        $boardAllowance['week']['monday'] = "Segunda";
        $boardAllowance['week']['tuesday'] = "Terça";
        $boardAllowance['week']['wednesday'] = "Quarta";
        $boardAllowance['week']['thursday'] = "Quinta";
        $boardAllowance['week']['friday'] = "Sexta";
        $boardAllowance['week']['saturday'] = "Sábado";
        $boardAllowance['week']['sunday'] = "Domingo";
        $boardAllowance['person']['name'] = $board->name;
        $boardAllowance['board']['type'] = $board->type;
        $boardAllowance['activities'] = array();
        foreach ($activities as $activity) {
            $actvt['id'] = $activity->id;
            $actvt['value'] = $activity->value;
            $actvt['name'] = $activity->name;
            $actvt['icon'] = $activity->icon;
            $actvt['propouse'] = $activity->propouse;
            foreach ($boardAllowance['week'] as $day => $name) {
                if ($activity->$day === 'Y') {
                    $actvt[$day] = 'img/quadros/fez.png';
                } elseif ($activity->$day === 'N') {
                    $actvt[$day] = 'img/quadros/nao-fez.png';
                } else {
                    $actvt[$day] = 'img/quadros/nao-pode.png';
                }
            }
            array_push($boardAllowance['activities'], $actvt);
        }
        
        $money = null;
        foreach ($boardAllowance['week'] as $day => $name) {
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
                        [$day, '=', 'Y'],
                    ]
                )
                ->sum('activities.value');
            $money = $money + $result[$day];
        }
        $result['money'] = $money;
        $boardAllowance['totals'] = $result;        
        return $boardAllowance;
    }

    public function copy($code)
    {
        //TODO: duplicar o quadro e as atividades (sem marcacao)
    }

    public function close($code)
    {
        if ($code) {
            Board::where('boards.code', $code)
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
        return back()->with($notification);
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
            ['activity_type_id' => 'required',
            'value' => 'required']
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
        $notification = array(
            'message' => 'Atividade criada!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
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
        $notification = array(
            'message' => 'Atividade excluída!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
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
            ['propouse_type_id' => 'required',
            'name' => 'required']
        );
        $data['user_id'] = Auth::user()->id;

        ActivityType::create($data);
        $notification = array(
            'message' => 'Atividade criada!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified activity type from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyActivityType($id)
    {
        $activity_type = ActivityType::find($id);
        $activity_type->delete();

        $notification = array(
            'message' => 'Atividade excluída!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
