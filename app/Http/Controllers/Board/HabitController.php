<?php

namespace App\Http\Controllers\board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use App\Mail\NewBoardMailable;

use App\Model\Board;
use App\Model\Person;
use App\Model\Activity;

use Auth;

class HabitController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.habit.create');
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
                'goal' => 'required'
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

        // 3 weeks to develop a habit
        $activityHabit = DB::table('propouse_types')
            ->join('activity_types', 'activity_types.propouse_type_id', '=', 'propouse_types.id')
            ->select('activity_types.id')
            ->where('propouse_types.propouse', '=', 'H')
            ->get();

        foreach ($activityHabit as $habit) {
            $actv['board_id'] = $board->id;
            $actv['activity_type_id'] = $habit->id;
            $actv['value'] = 1;
            $actv['code'] = Str::uuid()->toString();
            Activity::create($actv);
        }

        // Send board link
        \Mail::to(Auth::user()->email)->send(
            new NewBoardMailable(
                route('board.show', $data['code']),
                'hábito',
                $data['name']
            )
        );

        $notification = array(
            'message' => 'Quadro criado!',
            'alert-type' => 'success'
        );

        return redirect()->route(
            'board.habit.edit',
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
            $board = DB::table('boards')
                ->join('people', 'boards.id', '=', 'people.board_id')
                ->select('boards.*', 'people.*')
                ->where('boards.code', '=', $code)
                ->whereNull('boards.deleted_at')
                ->first();

            return view(
                'board.habit.edit',
                compact('board')
            );
        } else {
            $notification = array(
                'message' => 'Código do quadro não localizado!',
                'alert-type' => 'error'
            );
            return view('board.habit.edit', $code)->with($notification);
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
                'name' => 'required|max:200',
                'gender' => 'required',
                'age' => 'required|numeric',
                'goal' => 'required'
            ]
        );
        $board = Board::where('code', $code)->first();
        if ($board) {
            $person = Person::find($board->id);
            $person->name = $data['name'];
            $person->gender = $data['gender'];
            $person->age = $data['age'];
            $board->person()->save($person);

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
