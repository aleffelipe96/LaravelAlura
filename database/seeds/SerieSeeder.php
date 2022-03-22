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
            ['nome' => 'Peaky Blinders'],
            ['nome' => 'Stranger Things'],
            ['nome' => 'Mr Robot']
        ];

        foreach ($series as $serie) {
            Serie::create($serie);
        }
    }
}
