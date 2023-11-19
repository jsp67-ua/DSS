<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cart;
use App\Models\CartLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++)
        {
            User::create([
                'name' => 'usuario'. strval($i),
                'email' => 'usuario'. strval($i). '@gmail.com',
                'address' => 'dirección del usuario'. strval($i),
                'password' => Hash::make('usuario@'. strval($i)),
            ]);
        }
        User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'address' => 'admin',
                'password' => Hash::make('admin'),
                'admin' => true,
            ]);
    }
}
