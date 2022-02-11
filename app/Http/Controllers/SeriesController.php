<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\SeriesRequest;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function save(SeriesRequest $request)
    {
        $serie = Serie::create($request->all());

        $request->session()->flash('mensagem', "Série $serie->nome criada com sucesso");

        return redirect()->route('series.home');
    }

    public function delete(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', "Série removida com sucesso");

        return redirect()->route('series.home');
    }
}
