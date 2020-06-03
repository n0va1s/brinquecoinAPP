<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PropouseType;

class PropouseTypeController extends Controller
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
        toastr('Cadastrado!', 'success');
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
        toastr('Atualizado!', 'success');
        return redirect()->route('propouse.type.index');
    }

    public function destroy($id)
    {
        PropouseType::find($id)->delete();
        toastr('Excluído!', 'success');
        return redirect()->route('propouse.type.index');
    }
}
