<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //criando um usuario(objeto) depois de ter criado UserSeeder. eEsses campo sao de campos obrigatorio por isso passe apenas esses
        User::create([
            'name' => 'Odenilson',
            'email' => 'od@gmail.com',
            'password' => bcrypt('12345678')
        ]);

    }
}
