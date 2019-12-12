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
    protected $week = ["monday", "tuesday", "wednesday",
        "thursday", "friday", "saturday", "sunday"];

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

        $monday = DB::table('marks')
                ->select('marks.*');

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

        $activitiesEmoji = $this->findEmoji($activities, $this->week);
        dd($activitiesEmoji);
        $result = $this->resultAllowance($code);
        $week = $this->week;

        return view('board.show', compact('board', 'activities', 'result', 'week'));
    }

    /**
     * Calculate value of allowance
     *
     * @param  string  $code
     * @return array $result
     */
    protected function resultAllowance($code)
    {
        $money = null;
        foreach ($this->week as $day) {
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
        return $result;
    }

    /**
     * Find a emoji to activity status
     *
     * @param  array  $activities
     * @return array $activities
     */
    protected function findEmoji($activities, $week)
    {
        $i = 0;
        foreach ($activities as $activity) {
            $activities[$i];
            $activities['id'] = $activity->id;
            $activities['value'] = $activity->value;
            $activities['name'] = $activity->name;
            $activities['icon'] = $activity->icon;
            $activities['propouse'] = $activity->propouse;
            foreach ($week as $day) {
                if ($activity->$day === 'Y') {
                    $activities[$day] = 'img/quadros/fez.png';
                } elseif ($activity->$day === 'N') {
                    $activities[$day] = 'img/quadros/nao-fez.png';
                } else {
                    $activities[$day] = 'img/quadros/nao-pode.png';
                }
            }
            $i++;
        }
        return $activities;
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
