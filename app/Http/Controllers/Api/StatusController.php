<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'message' => 'Brinque Coin APIs',
            ]
        );
    }
}
