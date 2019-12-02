<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = DB::table('boards')
            ->join('children', 'boards.id', '=', 'children.board_id')
            ->join('board_types', 'board_types.id', '=', 'boards.board_type_id')
            ->select(
                'boards.*',
                'children.name',
                'children.age',
                'children.gender',
                'board_types.name',
                'board_types.image'
            )
            ->get();
        return view('board.index', compact('registros'));
    }

    public function show()
    {
        return view('board.show');
    }
}
