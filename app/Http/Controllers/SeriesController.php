<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\SeriesRequest;
use App\Services\SerieService;
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

    public function save(SeriesRequest $request, SerieService $serieService)
    {
        $serie = $serieService->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );

        $request->session()->flash('mensagem', "Série $serie->nome criada com sucesso");

        return redirect()->route('series.index');
    }

    public function delete(Request $request, SerieService $serieService)
    {
        $nomeSerie = $serieService->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série $nomeSerie removida com sucesso");

        return redirect()->route('series.index');
    }
}
