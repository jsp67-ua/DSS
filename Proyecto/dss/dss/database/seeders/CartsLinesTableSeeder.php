<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Events\CartLineAdded;
use App\Events\CartAdded;

class CartsLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = Cart::all();

        foreach( $cart as $c )
        {
            $total = 0;
            for($i = 0; $i < rand(0, 6); $i++)
            {
                $amount = rand(1, 5);
                $product = Product::all()->random();
                $cartLine = CartLine::create([
                    'amount'        => $amount,
                    'product_id'    => $product->id,
                    'cart_id'       => $c->id,
                ]);
                event(new CartLineAdded($cartLine));
            }
            event(new CartAdded($c));
        }
        $cart = Cart::find(14);
        for($i = 0; $i < 6; $i++)
            {
                $amount = rand(1, 5);
                $product = Product::all()->random();
                $cartLine = CartLine::create([
                    'amount'        => $amount,
                    'product_id'    => $product->id,
                    'cart_id'       => $cart->id,
                ]);
                event(new CartLineAdded($cartLine));
            }
        event(new CartAdded($cart));
    }
}
