<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Model\User;

use Auth;

class CancelController extends Controller
{
    public function index()
    {
        return view('user.confirm');
    }

    public function cancel()
    {
        Log::info('##BRINQUECOIN## [CADASTRO CANCELADO]');
        User::where('email', '=', Auth::user()->email)->delete();
        toastr('Seu cadastro foi cancelado :(', 'info');
        return redirect()->route('site.home');
    }
}
