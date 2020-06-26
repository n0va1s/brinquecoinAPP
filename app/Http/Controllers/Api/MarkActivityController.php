<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use App\Model\Board;
use App\Model\Activity;
use App\Model\Mark;

class MarkActivityController extends Controller
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
     * Store a mark of activity realization on board.
     *
     * @param  \Illuminate\Http\Request $req
     * @return \Illuminate\Http\Response
     */
    public function mark(Request $req)
    {
        $code   = $req->input('board');
        $id     = $req->input('activity');
        $day    = $req->input('day');
        $value  = $req->input('value');
        
        $board = Board::where(
            'code',
            '=',
            $code
        )->firstOrFail();

        if ($board) {
            $boardId = Activity::find($id)->board_id;
            if ($board->id === $boardId) {
                Mark::updateOrCreate(
                    ['activity_id'=>$id],
                    [$day => $value]
                );
                $notification = [
                    'success'=>'Data stored',
                    'data'=>"activity: $id - day: $day - value: $value"
                ];
            } else {
                $notification = [
                    'error'=>'This activity dont belongs to this board',
                    'activity'=>$id
                ];
            }
        } else {
            $notification = [
                'error'=>'Board not found',
                'board'=>$code
            ];
        }
        return response()->json($notification);
    }
}
