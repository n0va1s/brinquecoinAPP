<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropouseTypeRequest;
use App\Model\PropouseType;

use Illuminate\Support\Facades\Log;

use Auth;

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
        return view('configuration.tipospropositos.index', compact('registros'));
    }

    public function create()
    {
        return view('configuration.tipospropositos.adicionar');
    }

    public function store(PropouseTypeRequest $req)
    {
        Log::info('##BRINQUECOIN## [NOVO TIPO DE PROPOSITO]');
        $data = $req->validated();
        $data['user_id'] = Auth::user()->id;
        PropouseType::create($data);
        toastr('Cadastrado!', 'success');
        return back();
    }

    public function edit($id)
    {
        $registro = PropouseType::find($id);
        return view('configuration.tipospropositos.editar', compact('registro'));
    }

    public function update(PropouseTypeRequest $req, $id)
    {
        $data = $req->validated();
        $data['user_id'] = Auth::user()->id;
        PropouseType::find($id)->update($data);
        toastr('Atualizado!', 'success');
        return back();
    }

    public function destroy($id)
    {
        Log::info('##BRINQUECOIN## [EXCLUSAO DE TIPO DE PROPOSITO]');
        PropouseType::find($id)->delete();
        toastr('Excluído!', 'success');
        return back();
    }
}
