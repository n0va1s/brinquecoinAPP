<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

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
            'rememberAt' => 'required|date',
            'message' => 'required',
            ]
        );
        $data['user_id'] = Auth::user()->id;
        $data['code'] = Str::uuid()->toString();

        $notification = array(
            'message' => 'Cápsula lacrada!',
            'alert-type' => 'success'
        );

        Capsule::create($data);
        return redirect()->route('capsule.index')->with($notification);
    }

    public function destroy($code)
    {
        $notification = array(
            'message' => 'Cápsula excluída!',
            'alert-type' => 'success'
        );
        Capsule::where('code', '=', $code)->delete();
        return redirect()->route('capsule.index')->with($notification);
    }
}
