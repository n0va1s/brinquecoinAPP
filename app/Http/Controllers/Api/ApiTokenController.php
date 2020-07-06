<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Model\User;

class ApiTokenController extends Controller
{
    public function update()
    {
        foreach (User::all() as $user) {
            $token = Str::random(60);

            $user->forceFill(
                [
                    'api_token' => hash('sha256', $token),
                ]
            )->save();
        }
        return response()->json(['message' => 'Tokens atualizados']);
    }

    public function user(Request $request)
    {
        $token = $request->header('api-token');
        dd($token);
        if (empty($token)) {
            abort(403, 'Não autenticado');
        }
        $user = User::where('api_token', $token)->get();
        if (empty($user)) {
            abort(404, 'Não encontrado');
        }
        return response()->json(['user' => $user]);
    }
}
