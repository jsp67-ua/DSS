<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = Type::all();

        $type->each( function( $t ) {
            for($i = 1; $i <= rand(1, 10); $i++)
            {
                Product::create([
                    'name' => 'producto '. strval($i). ' del tipo '.strval($t->id),
                    'type_id' => $t->id,
                    'description' => 'descripcion del producto '. strval($i). ' pertenece al tipo '. strval($t->id),
                    'price' => floatval( rand(1.00, 2000.00) ),
                    'stock' => rand(100, 1500),
                ]);
            }
        });
    }
}
