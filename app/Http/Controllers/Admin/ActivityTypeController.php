<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityTypeRequest;
use App\Model\ActivityType;
use App\Model\PropouseType;

use Auth;

class ActivityTypeController extends Controller
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
    
    public function index()
    {
        $data = ActivityType::all();
        return view('configuration.tiposatividades.index', compact('data'));
    }

    public function create()
    {
        $types = PropouseType::all();
        return view('configuration.tiposatividades.adicionar', compact('types'));
    }

    public function store(ActivityTypeRequest $req)
    {
        $data = $req->validated();
        $data['user_id'] = Auth::user()->id;
        ActivityType::create($data);
        toastr('Cadastrado!', 'success');
        return redirect()->route('activity.type.index');
    }

    public function edit($id)
    {
        $data = ActivityType::find($id);
        $types = PropouseType::all();
        return view('configuration.tiposatividades.editar', compact('data', 'types'));
    }

    public function update(ActivityTypeRequest $req, $id)
    {
        $data = $req->validated();
        $data['user_id'] = Auth::user()->id;
        ActivityType::find($id)->update($data);
        toastr('Atualizado!', 'success');
        return redirect()->route('activity.type.index');
    }

    public function destroy($id)
    {
        ActivityType::find($id)->delete();
        toastr('Excluído!', 'success');
        return redirect()->route('activity.type.index');
    }
}
