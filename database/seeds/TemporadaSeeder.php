<?php

use App\Models\Temporada;
use Illuminate\Database\Seeder;

class TemporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temporadas = [
            [
                'numero_temporada' => 1,
                'serie_id' => 1
            ],
            [
                'numero_temporada' => 2,
                'serie_id' => 1
            ],
            [
                'numero_temporada' => 1,
                'serie_id' => 2
            ],
            [
                'numero_temporada' => 2,
                'serie_id' => 2
            ],
            [
                'numero_temporada' => 1,
                'serie_id' => 3
            ],
            [
                'numero_temporada' => 2,
                'serie_id' => 3
            ]
        ];

        foreach ($temporadas as $temporada) {
            Temporada::create($temporada);
        }
    }
}
