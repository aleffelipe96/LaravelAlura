<?php

use App\Models\Episodio;
use Illuminate\Database\Seeder;

class EpisodioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $episodios = [

            /**
             * Temporada ID 1
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 1
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 1
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 1
            ],

            /**
             * Temporada ID 2
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 2
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 2
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 2
            ],

            /**
             * Temporada ID 3
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 3
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 3
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 3
            ],

            /**
             * Temporada ID 4
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 4
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 4
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 4
            ],

            /**
             * Temporada ID 5
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 5
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 5
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 5
            ],

            /**
             * Temporada ID 6
             */
            [
                'numero_episodio' => 1,
                'temporada_id' => 6
            ],
            [
                'numero_episodio' => 2,
                'temporada_id' => 6
            ],
            [
                'numero_episodio' => 3,
                'temporada_id' => 6
            ],
        ];

        foreach ($episodios as $episodio) {
            Episodio::create($episodio);
        }
    }
}
