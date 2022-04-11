<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Events\NovaSerieEvent;
use App\Services\SerieService;
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

    public function save(SeriesRequest $request, SerieService $serieService)
    {
        $serie = $serieService->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->qtd_episodios
        );

        $evento = new NovaSerieEvent($request->nome, $request->qtd_temporadas, $request->qtd_episodios);
        event($evento);

        $request->session()->flash('mensagem', "Série $serie->nome criada com sucesso");

        return redirect()->route('series.index');
    }

    public function delete(Request $request, SerieService $serieService)
    {
        $nomeSerie = $serieService->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série $nomeSerie removida com sucesso");

        return redirect()->route('series.index');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
}
