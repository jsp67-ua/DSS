<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Orderline;
use App\Models\CartLine;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class OrderServices {
    public static function processOrder() {
        $rollback = false;
        DB::beginTransaction();
        $cart = Cart::where('user_id',Auth::user()->id)->first();
        $cartLine = $cart->getCartLines();
        $order = new Order();
        $order->setUserId(Auth::user()->id);
        $order->save();
        $cartLin = new CartLine;
        foreach ($cartLine as $cartLines) {
                $product = $cartLines->getProduct();
                $amount = $cartLines->getAmount();
            if ($product->getStock() >= $amount) {
                $product->setStock($product->getStock() - $amount);
                $product->update();
                
                $line = new Orderline();
                $line->setAmount($amount);
                $line->setOrderId($order->getId());
                $line->setProductId($product->getId());
                $line->updateTotal();
                $line->save();
            } else {
                $cartLin = $cartLines;
                $rollback = true;
                break;
            }
        }
        $order->updateTotal();
        if ($rollback) {
            DB::rollBack();
            return $cartLin;
        }
        DB::commit();
        return $order;
        }
        
}