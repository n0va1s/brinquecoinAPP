<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/quadros';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Update the authenticated user's API token.
     *
     * @param  \App\Model\User  $user
     * @return array
     */
    public function getToken(User $user)
    {
        $token = Str::random(80);
        $user->forceFill(
            [
                'api_token' => hash('sha256', $token),
            ]
        )->save();
        return $token;
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $token = $this->getToken($user);
        $cookie = getenv('SESSION_COOKIE_NAME');
        if (empty($token) || empty($cookie)) {
            toastr('Erro ao recuperar as credenciais da API', 'error');
            return redirect('/login');
        }
        $request->session()->put($cookie, $token);
    }
}
