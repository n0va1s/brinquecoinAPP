<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

use App\Mail\NewCapsuleMailable;

use App\Model\Capsule;
use Auth;

class CapsuleController extends Controller
{
    public function index()
    {
        $registros = Capsule::Paginate(3);
        return view('capsule.index', compact('registros'));
    }

    public function create()
    {
        return view('capsule.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate(
            [
            'from' => 'required|max:200',
            'to' => 'required|max:200',
            'email' => 'required|email',
            'remember_at' => 'required|date',
            'message' => 'required',
            ]
        );
        if (!$data) {
            return back()->withInput();
        }

        $data['user_id'] = Auth::user()->id;
        $data['code'] = Str::uuid()->toString();
        
        Mail::to(Auth::user()->email)->send(
            new NewCapsuleMailable(Auth::user()->name)
        );

        Capsule::create($data);
        toastr('Cápsula lacrada!', 'success');
        return redirect()->route('capsule.index');
    }

    public function destroy($code)
    {
        Capsule::where('code', '=', $code)->delete();
        toastr('Cápsula cancelada!', 'success');
        return redirect()->route('capsule.index');
    }
}
