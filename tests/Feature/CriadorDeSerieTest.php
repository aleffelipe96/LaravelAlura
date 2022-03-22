<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Services\SerieService;
use Tests\TestCase;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    //use RefreshDatabase;

    public function testCriarSerie()
    {
        $criadorDeSerie = new SerieService();
        $nomeSerie = 'Teste 1';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero_temporada' => 1]);
        $this->assertDatabaseHas('episodios', ['numero_episodio' => 1]);
    }
}
