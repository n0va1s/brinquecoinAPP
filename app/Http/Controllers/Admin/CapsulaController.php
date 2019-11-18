<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Capsula;
use Auth;

class CapsulaController extends Controller
{
    public function index()
    {
        $registros = Capsula::Paginate(3);
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
        $dados['codigo'] = Str::uuid()->toString();

        Capsula::create($dados);
        return redirect()->route('admin.capsula');
    }

    public function deletar($codigo)
    {
        //Capsula::find($codigo)->delete();
        Capsula::where('codigo', '=', $codigo)->delete();
        /*return redirect()->route('admin.capsula.adicionar')
            ->with('success', 'Cápsula excluída!');*/
        return redirect()->route('admin.capsula');
    }
}
