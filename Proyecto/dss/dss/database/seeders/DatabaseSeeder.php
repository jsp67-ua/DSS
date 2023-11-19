<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Orderline;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Cart;
use App\Models\CartLine;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeder para crear Usuarios -->
        $this->call([
            UsersTableSeeder::class,
            TypesTableSeeder::class,
            ProductsTableSeeder::class,
            SuppliersTableSeeder::class,
            CartsTableSeeder::class,
            CartsLinesTableSeeder::class,
            OrdersTableSeeder::class,
            OrdersLinesTableSeeder::class,
        ]);
    }
}
