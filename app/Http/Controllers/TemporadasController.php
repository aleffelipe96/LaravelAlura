<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $temporadas = $serie->temporadas;
        $mensagem = $request->session()->get('mensagem');

        return view('temporadas.index', compact('serie', 'temporadas', 'mensagem'));
    }
}
