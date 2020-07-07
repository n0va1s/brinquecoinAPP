<?php

namespace App\Http\Middleware;

use App\Model\User;

class AuthenticateApiByToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, $next)
    {
        $token = $request->header('api_token');
        if (empty($token)) {
            abort(403, 'Usuário não autenticado');
        }
        $user = User::where('api_token', $token)->get();
        if (empty($user)) {
            abort(404, 'Usuário não encontrado');
        }
        return $next($request);
    }
}
