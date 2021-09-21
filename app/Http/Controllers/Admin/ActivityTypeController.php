<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ActivityTypeRequest;
use App\Model\ActivityType;
use App\Model\PropouseType;
use Illuminate\Support\Facades\DB;

class ActivityTypeController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = ActivityType::class;
        $this->viewName = 'configuration.tiposatividades';
        $this->routeIndex = 'propouse.type.index';
        $this->types = PropouseType::class;
        $this->validatorName = ActivityTypeRequest::class;
        $this->listGrid = DB::table('activity_types')
            ->join('propouse_types', 'propouse_types.id', '=', 'activity_types.propouse_type_id')
            ->select(
                'activity_types.id',
                'activity_types.name as activity_type',
                'propouse_types.name as propouse_type'
            )->get();
    }
}
