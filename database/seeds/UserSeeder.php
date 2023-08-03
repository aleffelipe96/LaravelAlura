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
                'name' => 'Felipe Santos',
                'email' => 'felipe@teste.com',
                'password' => Hash::make('felipe123')
            ]
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}
