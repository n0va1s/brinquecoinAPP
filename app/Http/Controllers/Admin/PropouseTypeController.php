<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropouseTypeRequest;
use App\Model\PropouseType;
use Illuminate\Support\Facades\DB;

class PropouseTypeController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = PropouseType::class;
        $this->viewName = 'configuration.tipospropositos';
        $this->routeIndex = 'propouse.type.index';
        $this->validatorName = PropouseTypeRequest::class;
        $this->listGrid = DB::table('propouse_types')
            ->select(
                'propouse_types.*'
            )->get();
    }
}
