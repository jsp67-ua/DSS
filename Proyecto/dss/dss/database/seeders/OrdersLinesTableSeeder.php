<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Orderline;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = Order::all();

        foreach( $order as $o )
        {
            $total = 0;
            for($i = 0; $i < rand(1, 6); $i++)
            {
                $amount = rand(1, 5);
                $product = Product::all()->random();
                $total += $amount * $product->price;
                OrderLine::create([
                    'amount'        => $amount,
                    'product_id'    => $product->id,
                    'order_id'       => $o->id,
                    'total'         => $amount * $product->price,
                ]);
            }
            $o->update([
                'total' => $total,
            ]);
        }
        $order = Order::find(14);
        for($i = 0; $i < 6; $i++)
            {
                $amount = rand(1, 5);
                $product = Product::all()->random();
                $total += $amount * $product->price;
                OrderLine::create([
                    'amount'        => $amount,
                    'product_id'    => $product->id,
                    'order_id'       => $o->id,
                    'total'         => $amount * $product->price,
                ]);
            }
            $order->update([
                'total' => $total,
            ]);

    }
}
