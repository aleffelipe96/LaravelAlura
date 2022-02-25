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
        $serie = Serie::create(['nome' => $request->nome]);

        $qtdTemporadas = $request->qtd_temporadas;

        $qtdEpisodios = $request->qtd_episodios;

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero_temporada' => $i]);

            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero_episodio' => $j]);
            }
        }

        $request->session()->flash('mensagem', "Série $serie->nome criada com sucesso");

        return redirect()->route('series.index');
    }

    public function delete(Request $request)
    {
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', "Série removida com sucesso");

        return redirect()->route('series.index');
    }
}
