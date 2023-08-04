<?php

use App\Models\Serie;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
            [
                'nome' => 'Peaky Blinders',
                'capa' => 'serie/Peaky_Blinders.jpg'
            ],
            [
                'nome' => 'Stranger Things',
                'capa' => 'serie/Stranger_Things.jpg'
            ],
            [
                'nome' => 'Mr Robot',
                'capa' => 'serie/Mr_Robot.jpg'
            ]
        ];

        foreach ($series as $serie) {
            Serie::create($serie);
        }
    }
}
