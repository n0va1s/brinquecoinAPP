<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Capsula;
use Auth;

class CapsulaController extends Controller
{
    public function index()
    {
        $registros = Capsula::all();
        return view('admin.capsula.index', compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.capsula.adicionar');
    }

    public function salvar(Request $req)
    {
        $dados = $req->validate([
            'nomeDe' => 'required|max:200',
            'nomePara' => 'required|max:200',
            'emailPara' => 'required|email',
            'avisadoEm' => 'required|date',
            'mensagem' => 'required',
        ]);
        $dados['user_id'] = Auth::user()->id;
        Capsula::create($dados);
        return redirect()->route('admin.capsula.adicionar')
            ->with('success', 'Cápsula lacrada!');
    }

    public function deletar($id)
    {
        Capsula::find($id)->delete();
        return redirect()->route('admin.capsula')
            ->with('success', 'Cápsula excluída!');
    }
}
