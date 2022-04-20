<?php

namespace App\Services;

use App\Events\ApagarSerieEvent;
use App\Jobs\DeletarCapaJob;
use Illuminate\Support\Facades\DB;
use App\Models\{Serie, Temporada, Episodio};

class SerieService
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios, ?string $capa): Serie
    {
        DB::beginTransaction();
            $serie = Serie::create([
                'nome' => $nomeSerie,
                'capa' => $capa
            ]);

            $this->criarTemporada($qtdTemporadas, $qtdEpisodios, $serie);
        DB::commit();

        return $serie;
    }

    private function criarTemporada(int $qtdTemporadas, int $qtdEpisodios, Serie $serie): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero_temporada' => $i]);
            $this->criarEpisodio($qtdEpisodios, $temporada);
        }
    }

    private function criarEpisodio(int $qtdEpisodios, Temporada $temporada): void
    {
        for ($j = 1; $j <= $qtdEpisodios; $j++) {
            $temporada->episodios()->create(['numero_episodio' => $j]);
        }
    }

    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';

        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $serieObj = (object) $serie->toArray();
            $nomeSerie = $serie->nome;

            $this->removerTemporada($serie);
            $serie->delete();

            // $evento = new ApagarSerieEvent($serieObj);
            // event($evento);

            DeletarCapaJob::dispatch($serieObj);
        });

        return $nomeSerie;
    }

    private function removerTemporada(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodio(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
