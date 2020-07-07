<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Model\Board;
use App\Model\Activity;
use App\Model\Mark;

class MarkActivityController extends Controller
{
    /**
     * Store a mark of activity realization on board.
     *
     * @param  \Illuminate\Http\Request $req
     */
    public function mark(Request $req)
    {
        $data = Validator::make(
            $req->all(),
            [
            'board'     => ['required', 'string'],
            'activity'  => ['required', 'string'],
            'day'       => ['required', 'string'],
            'value'     => ['required', 'string'],
            ]
        );
        if (!isset($data)) {
            abort(503, 'Data not foud');
        }
        $board = Board::where('code', $data->board)->first();
        if ($board) {
            $boardId = Activity::find($data->id)->board_id;
            if ($board->id === $boardId) {
                return Mark::updateOrCreate(
                    ['activity_id'=>$data->id],
                    [$data->day => $data->value]
                );
            } else {
                abort(404, 'This activity dont belongs to this board');
            }
        } else {
            abort(404, 'Board not found');
        }
    }
}
