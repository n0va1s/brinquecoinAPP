<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

abstract class CrudController extends Controller
{
    
    protected $className, $validatorName, $viewName, $routeIndex, $types, $listGrid, 
    $paginateGrid;
    
    public function index()
    {
        //$data = $this->className::all();
        $data = $this->listGrid;
        if (isset($this->paginateGrid)) {
            $data = $this->className::paginate($this->paginateGrid);    
        }
        return view($this->viewName.'.index', compact('data'));
    }

    public function create()
    {
        Log::info('##BRINQUECOIN## [INSERT] - '.$this->className);
        if (isset($this->types)) {
            $types = $this->types::all();
            return view($this->viewName.'.adicionar', compact('types'));
        }
        return view($this->viewName.'.adicionar');
    }

    public function store(Request $req)
    {
        $data = $req->except('_token');
        $this->validate($req, (new $this->validatorName)->rules());
        //$data['user_id'] = Auth::user()->id;
        $data['code'] = Str::uuid()->toString();
        $this->className::create($data);
        toastr('Cadastrado!', 'success');
        return redirect()->route($this->routeIndex);
    }

    public function edit(string $code)
    {
        $data = $this->className::where('code', $code)->first();
        if (is_null($data)) {
            toastr('Não foi possível encontrar esse registro', 'error');
            return back();
        }
        if (isset($this->types)) {
            $types = $this->types::all();
            return view($this->viewName.'.editar', compact('data', 'types'));
        }
        return view($this->viewName.'.editar', compact('data'));        
    }

    public function update(Request $req, string $code)
    {
        $data = $req->except('_token');
        $this->validate($req, (new $this->validatorName)->rules());
        //$data['user_id'] = Auth::user()->id;
        $this->className::where('code', $code)->first()->update($data);
        //$this->className::fill($data);
        toastr('Atualizado!', 'success');
        return redirect()->route($this->routeIndex);
    }

    public function destroy(string $code)
    {
        Log::info('##BRINQUECOIN## [DELETE]'.$this->className);
        $qtd = $this->className::where('code', $code)->first()->delete();
        if ($qtd === 0) {
            toastr('Não foi possível excluir esse registro', 'error');
            return back();
        }
        toastr('Excluído!', 'success');
        return redirect()->route($this->routeIndex);
    }
}
