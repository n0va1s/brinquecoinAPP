<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BoardTypeRequest;
use App\Model\BoardType;
use Illuminate\Support\Facades\DB;

class BoardTypeController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = BoardType::class;
        $this->viewName = 'configuration.tiposquadros';
        $this->routeIndex = 'board.type.index';
        $this->validatorName = BoardTypeRequest::class;
        $this->listGrid = DB::table('board_types')
            ->select(
                'board_types.*'
            )
            ->whereNull('board_types.deleted_at')
            ->get();
    }
}
