<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['verified']);
    }

    /**
     * Show the home page
     *
     * @return view
     */
    public function index()
    {
        $result['board'] = DB::table('boards')->count();
        $result['parent'] = DB::table('users')->count();
        $result['age'] = DB::table('boards')
            ->join('people', 'people.board_id', '=', 'boards.id')
            ->join('board_types', 'board_types.id', '=', 'boards.board_type_id')
            ->whereIn('board_types.type', ['T','M'])
            ->avg('age');
        $result['type'] = DB::table('boards')
            ->join(
                'board_types',
                'board_types.id',
                '=',
                'boards.board_type_id'
            )
            ->select(DB::raw('board_types.name as name, count(*) as qtd'))
            ->groupBy('board_types.name')
            ->orderBy('qtd', 'desc')
            ->first();

        //Adding totals of old version
        $result['board'] = $result['board'] + 113;
        $result['parent'] = $result['parent'] + 43;
        if (!$result['age']) {
            $result['age'] = 0;
        } else {
            $result['age'] = round($result['age']);
        }
        if (!$result['type']) {
            $result['type'] = "A definir";
        } else {
            $result['type'] = $result['type']->name;
        }

        $result['capsuleCreated'] = DB::table('capsules')->count();
        $result['capsuleSent'] = DB::table('capsules')->where('status', '=', 'R')->count();

        return view('home', compact('result'));
    }
}
