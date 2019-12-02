<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Model\Board;

class HomeController extends Controller
{
    public function index()
    {
        $registros = Board::paginate(3);
        return view('home', compact('registros'));
    }
}
