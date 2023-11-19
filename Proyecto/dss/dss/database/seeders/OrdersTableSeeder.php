<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Orderline;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::all();

        $user->each( function( $u ) {

            for($i = 0; $i < rand(0, 3); $i++)
            {
                Order::create([
                    'user_id'   => $u->id,
                    'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
                    'payment_method' => fake()->randomElement(['card', 'transfer']),
                ]);
            }
        }); 
    }
}