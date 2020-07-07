<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Model\User;

class ApiTokenController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Brinque Coin APIs']);
    }

    /**
     * Generate and update token for all users
     *
     * @return array
     */
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

    /**
     * Return a user by token
     *
     * @param  Illuminate\Http\Request  $request
     * @return user
     */
    public function user(Request $request)
    {
        $token = $request->header('api_token');
        $user = User::where('api_token', $token)->get();
        if (empty($user)) {
            abort(404, 'Não encontrado');
        }

        return response()->json(['user' => $user]);
    }
}
