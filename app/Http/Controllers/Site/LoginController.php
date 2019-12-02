<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function signin(Request $req)
    {
        $dados = $req->all();
        if (Auth::attempt(['email'=>$dados['email'],'password'=>$dados['senha']])) {
            return redirect()->route('board.index');
        }
        return redirect()->route('site.login');
    }
    public function signout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
