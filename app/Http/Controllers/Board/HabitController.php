<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;

use App\Notifications\NewBoard;

use App\Model\Board;
use App\Model\Person;
use App\Model\Activity;

use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HabitController extends Controller
{
    public function create()
    {
        return view('board.habit.create');
    }

    public function store(Request $req)
    {
        Log::info('##BRINQUECOIN## [QUADRO DE HABITO CRIADO]');
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
        toastr('Quadro criado!', 'success');

        // 3 weeks to develop a habit
        $activityHabit = DB::table('propouse_types')
            ->join(
                'activity_types', 
                'activity_types.propouse_type_id', '=', 'propouse_types.id'
            )
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
        $req->user()->notify(
            new NewBoard(
                route('board.show', $data['code']),
                'hábito',
                Auth::user()->name
            )
        );

        toastr('Email enviado com os dados do seu quadro', 'info');
        return redirect()->route('board.index');
    }

    public function edit(string $code) : View
    {
        if (!isset($code)) {
            toastr('O código do quadro é obrigatório. Favor verificar', 'error');
            return back();
        }
        $board = DB::table('boards')
            ->join('people', 'boards.id', '=', 'people.board_id')
            ->select('boards.*', 'people.*')
            ->where('boards.code', '=', $code)
            ->whereNull('boards.deleted_at')
            ->first();

        return view('board.habit.edit', compact('board'));
    }

    /*
    * Return  RedirectResponse
    */
    public function update(Request $req, string $code)
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
        if (!isset($board)) {
            toastr('Quadro não encontrado. Favor verificar', 'error');
            return back();
        }
        $board->goal = $data['goal'];

        $person = Person::find($board->id);
        $person->name = $data['name'];
        $person->gender = $data['gender'];
        $person->age = $data['age'];
        $board->person()->save($person);
        $board->save();

        toastr('Quadro atualizado!', 'success');
        return redirect()->route('board.index');
    }

    public function destroy(string $code)
    {
        $deleted =  Board::where('code', '=', $code)->firstOrFail()->delete();
        if ($deleted === 0) {
            toastr('Quadro não encontrado. Favor verificar', 'error');
        }
        return redirect()->route('board.index');
    }
}
