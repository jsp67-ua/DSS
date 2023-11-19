<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartLine;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\CartLineAdded;
use App\Events\CartAdded;

class CartLineController extends Controller
{
    /*
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\CartLine  $cartline
    * @return \Illuminate\Http\Response
    */
   public function update($cartlineid,Request $request)
   {
        $stock = 0;
        $mayor0 = 0;
        $cartline = CartLine::find(intval($cartlineid));
        $product = $cartline->getProduct();
        if($product->stock >= intval($request->input('amount'))){
            $stock = 1;
            if(intval($request->input('amount')) > 0){
                $cartline = CartLine::find(intval($cartlineid));
                $cartline->setAmount(intval($request->input('amount')));
                $cartline->updateTotal();
                $cartline->save();
                event(new CartAdded(Cart::find($cartline->cart_id)));
                $mayor0 = 1;
            }
        }
        if(intval($request->input('amount')) > 0){
            $mayor0 = 1;
        }
        return redirect()->route('cartuser.index',[
            'stock' => $stock,
            'mayor0' => $mayor0,
            'itemid' => $cartlineid
        ]);
   }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartLine  $cartline
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartLine $cartline)
    {
        $cartline->delete();
        $cart = Cart::where('id', $cartline->cart_id)->first();
        $cart->updateTotal();
        return redirect()->route('cart.index');
    }
    

    public function destroyuser(CartLine $cartline)
    {
        $cartline->delete();
        $cart = Cart::where('id', $cartline->cart_id)->first();
        $cart->updateTotal();
        return redirect()->route('cartuser.index');
    }
}
