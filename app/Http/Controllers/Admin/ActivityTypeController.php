<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ActivityType;
use App\Model\PropouseType;

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
        $registros = ActivityType::all();
        return view('board.type.index', compact('registros'));
    }

    public function create()
    {
        $tiposPropositos = PropouseType::all();
        return view('board.type.create', compact('tiposPropositos'));
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        ActivityType::create($dados);
        toastr('Cadastrado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function edit($id)
    {
        $registro = ActivityType::find($id);
        return view('board.type.edit', compact('registro'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        ActivityType::find($id)->update($dados);
        toastr('Atualizado!', 'success');
        return redirect()->route('board.type.index');
    }

    public function destroy($id)
    {
        ActivityType::find($id)->delete();
        toastr('Excluído!', 'success');
        return redirect()->route('board.type.index');
    }
}
