<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Quadro;
use App\Atividade;
use App\TipoAtividade;

use Auth;

class AtividadeController extends Controller
{
    public function save(Request $req)
    {
        $data = $req->validate(
            ['tipo_proposito_id' => 'required',
            'descricao' => 'required']
        );
        $data['user_id'] = Auth::user()->id;

        TipoAtividade::create($data);

        $notification = array(
            'message' => 'Atividade criada!',
            'alert-type' => 'success'
        );
        return redirect()->route(
            'admin.quadros.editar',
            $req->input('codigo')
        )->with($notification);
    }
}
