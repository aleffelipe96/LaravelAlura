<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $serieId = $temporada->serie_id;
        $temporadaId = $temporada->id;
        $episodios = $temporada->episodios;
        $num_temporada = $temporada->numero_temporada;
        $mensagem = $request->session()->get('mensagem');

        return view('episodios.index', compact('serieId', 'temporadaId', 'episodios', 'num_temporada', 'mensagem'));
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $serieId = $temporada->serie_id;

        if ($request->has('episodio')) {
            $idsEpisodiosAssistidos = array_keys($request->episodio);
        } else {
            $idsEpisodiosAssistidos = [];
        }

        $temporada->episodios->each(function (Episodio $episodio) use ($idsEpisodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $idsEpisodiosAssistidos);
        });

        $temporada->push();
        $request->session()->flash('mensagem', 'Episódios marcados com sucesso!');

        return redirect()->route('temporadas.index', ['id' => $serieId]);
    }
}
