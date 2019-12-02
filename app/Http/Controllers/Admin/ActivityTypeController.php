<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Activity_Type;
use App\Model\Propouse_Type;

class ActivityTypeController extends Controller
{
    public function index()
    {
        $registros = Activity_Type::all();
        return view('board.type.index', compact('registros'));
    }

    public function create()
    {
        $tiposPropositos = Propouse_Type::all();
        return view('board.type.create', compact('tiposPropositos'));
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        Activity_Type::create($dados);
        return redirect()->route('board.type.index');
    }

    public function edit($id)
    {
        $registro = Activity_Type::find($id);
        return view('board.type.edit', compact('registro'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        Activity_Type::find($id)->update($dados);
        return redirect()->route('board.type.index');
    }

    public function destroy($id)
    {
        Activity_Type::find($id)->delete();
        return redirect()->route('board.type.index');
    }
}
