<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CapsuleRequest;
use App\Notifications\NewCapsule;
use App\Model\Capsule;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CapsuleController extends CrudController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->className = Capsule::class;
        $this->viewName = 'capsule';
        $this->routeIndex = 'capsule.index';
        $this->validatorName = CapsuleRequest::class;
        $this->listGrid = DB::table('capsules')
            ->select(
                'capsules.*'
            )
            ->whereNull('capsules.deleted_at')
            ->get();
        $this->paginateGrid = 3;
    }

    public function store(Request $req)
    {
        $data = $req->except('_token');
        $this->validate($req, (new CapsuleRequest)->rules());
        $data['user_id'] = Auth::user()->id;
        $data['code'] = Str::uuid()->toString();
            
        $req->user()->notify(new NewCapsule(Auth::user()->name));
        
        Capsule::create($data);
        toastr('Cápsula lacrada!', 'success');
        toastr('Mandamos um email pra vc saber que deu tudo certo :)', 'info');
        Log::info('##BRINQUECOIN## [CAPSULA CRIADA]');
        return redirect()->route('capsule.index');
    }
}
