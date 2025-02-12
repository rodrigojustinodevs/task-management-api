<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cria o usuário com o ID 2
        User::create([
            'id' => (string) Str::uuid(),  // Gera um UUID para o id
            'name' => 'Usuário 2',
            'email' => 'usuario2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('senhaSegura123'), // Senha criptografada
        ]);
    }
}
