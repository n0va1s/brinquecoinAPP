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
            ->join('people', 'boards.id', '=', 'people.board_id')
            ->join('board_types', 'board_types.id', '=', 'boards.board_type_id')
            ->select(
                'boards.*',
                'people.name',
                'people.age',
                'people.gender',
                'board_types.name',
                'board_types.image'
            )
            ->get();
        return view('board.index', compact('registros'));
    }

    public function copy($code)
    {
        //TODO: duplicar o quadro e as atividades (sem marcacao)
    }

    public function close($code)
    {
        if ($code) {
            $resultado = DB::table('boards')
                ->where('boards.code', $code)
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
    }
}
