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
                'name' => 'Elon Musk',
                'email' => 'elon@teste.com',
                'password' => Hash::make('elon123')
            ],
            [
                'name' => 'Bill Gates',
                'email' => 'bill@teste.com',
                'password' => Hash::make('bill123')
            ]
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}
