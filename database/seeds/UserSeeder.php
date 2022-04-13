<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'name' => 'Alef Silva',
                'email' => 'alef@teste.com',
                'password' => Hash::make('alef123')
            ],
            [
                'name' => 'Felipe Dantas',
                'email' => 'felipe@teste.com',
                'password' => Hash::make('felipe123')
            ],
            [
                'name' => 'João Santos',
                'email' => 'joao@teste.com',
                'password' => Hash::make('joao123')
            ],
            [
                'name' => 'Flávio Almeida',
                'email' => 'flavio@teste.com',
                'password' => Hash::make('flavio123')
            ],
            [
                'name' => 'Pedro Souza',
                'email' => 'pedro@teste.com',
                'password' => Hash::make('pedro123')
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}
