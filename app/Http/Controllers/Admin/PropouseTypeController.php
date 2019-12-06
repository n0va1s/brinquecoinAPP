<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PropouseType;

class PropouseTypeController extends Controller
{
    public function index()
    {
        $registros = PropouseType::all();
        return view('propouse.type.index', compact('registros'));
    }

    public function create()
    {
        return view('propouse.type.create');
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        PropouseType::create($dados);
        return redirect()->route('propouse.type.index');
    }

    public function edit($id)
    {
        $registro = PropouseType::find($id);
        return view('propouse.type.edit', compact('registro'));
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        PropouseType::find($id)->update($dados);
        return redirect()->route('propouse.type.index');
    }

    public function destroy($id)
    {
        PropouseType::find($id)->delete();
        return redirect()->route('propouse.type.index');
    }
}
