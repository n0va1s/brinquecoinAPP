<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Quadro;

class HomeController extends Controller
{
    public function index()
    {
      $registros = Quadro::paginate(3);
      return view('home',compact('registros'));
    }
}
