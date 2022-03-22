<?php

namespace Tests\Feature;

use App\Models\Serie;
use App\Services\SerieService;
use Tests\TestCase;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    //use RefreshDatabase;

    /** @var Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new SerieService();

        $this->serie = $criadorDeSerie->criarSerie('Nome da série', 1, 1);
    }

    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $removedorDeSerie = new SerieService();

        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da série',  $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
