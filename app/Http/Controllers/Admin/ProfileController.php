<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Auth;
use App\User;

class ProfileController extends Controller
{
    use ResetsPasswords;
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $req)
    {
        $data = $req->validate(
            [
            'name' => 'required|max:200',
            'email' => 'required|email',
            'password' => 'required'
            ]
        );
        $data['code'] = Str::uuid()->toString();
        $data['password'] = bcrypt($req->input('password'));

        User::create($data);
        $notification = array(
            'message' => 'Perfil criado!',
            'alert-type' => 'success'
        );

        return redirect()->route('site.login')->with($notification);
    }

    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $req)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $data = $req->validate(
                [
                    'name' => 'required|max:255',
                    'email' => 'required|max:100',
                    'password' => 'required'
                ]
            );
            $data['password'] = md5($data['password']);

            $user->update($data);
            $notification = array(
            'message' => 'Perfil atualizado',
            'alert-type' => 'success');
        } else {
            $notification = array(
            'message' => 'Perfil não encontrado. Tente novamente.',
            'alert-type' => 'error');
        }

        return redirect()->route('profile.edit')
        ->with($notification);
    }

    public function remember(Request $req)
    {
        return view('profile.remember');
    }
}
