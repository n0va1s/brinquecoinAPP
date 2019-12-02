<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Propouse_Type;

class PropouseTypeController extends Controller
{
    public function index()
    {
        $registros = Propouse_Type::all();
        return view('propouse.type.index', compact('registros'));
    }

    public function create()
    {
        return view('propouse.type.create');
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        Propouse_Type::create($dados);
        return redirect()->route('propouse.type.index');
    }

    public function edit($id)
    {
        $registro = Propouse_Type::find($id);
        return view('propouse.type.edit', compact('registro'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        Propouse_Type::find($id)->update($dados);
        return redirect()->route('propouse.type.index');
    }

    public function destroy($id)
    {
        Propouse_Type::find($id)->delete();
        return redirect()->route('propouse.type.index');
    }
}
