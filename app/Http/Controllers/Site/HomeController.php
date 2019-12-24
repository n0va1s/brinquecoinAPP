<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result['board'] = DB::table('boards')->count();
        $result['parent'] = DB::table('users')->count();
        $result['age'] = DB::table('people')
            ->select(DB::raw('age as value, count(*) as qtd'))
            ->groupBy('age')
            ->orderBy('qtd', 'desc')
            ->first();
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

            return view('home', compact('result'));
    }
}
