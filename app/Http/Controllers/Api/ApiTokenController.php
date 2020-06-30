<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
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
        return response()->json(
            [
                'message' => 'Tokens atualizados',
            ]
        );
    }

    public function user(string $token)
    {
        $user = User::where('api_token', $token);
        return response()->json(
            [
                'message' => $user,
            ]
        );
    }
}
