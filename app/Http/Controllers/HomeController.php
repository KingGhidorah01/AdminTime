<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Dia;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $actividades = Actividad::with('diasRel')->get();
        $dias = Dia::all()->where('status','=',1);
        return view('home', compact('actividades', 'dias'));
    }
}
