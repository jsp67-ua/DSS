<?php

namespace Database\Seeders;

use App\Models\Supplier;
use App\Models\Product;
use Faker;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(){
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\es_ES\PhoneNumber($faker));
        for($i = 1; $i <= 20; $i++)
        {
            Supplier::create([
                'name'          => 'proveedor '. strval($i),
                'description'   => 'descripcion del proveedor '. strval($i),
                'email'         => 'proveedor'. strval($i) .'@gmail.com',
                'phone'         => $faker->mobileNumber(),
            ])->each( function( $supplier ) {
                $supplier->products()->sync( Product::all()->random(5) );
            });
        }
    }
}
