<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Cart;
use App\Models\CartLine;
use App\Events\CartAdded;
use App\Services\OrderServices as Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckCart extends Component
{
    public $paymentMethod;

    public function purchase()
    {
        Log::info('compra');
        //Obtenemos la cesta de compra del usuario actual
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        $cartlines = CartLine::where('cart_id', $cart->id);
        if($cartlines->count() != 0){
            $order = Service::processOrder();
            if($order instanceof Order){
                Log::info('compra');
                if($this->paymentMethod == null) $order->payment_method = "card";
                else $order->payment_method = $this->paymentMethod;
                $order->status = "accepted";
                $order->save();
                
                //Borramos la cesta
                $cartLines = $cart->getCartLines();
                foreach($cartLines as $cartLine){
                    $cartLine->delete();
                }
                event(new CartAdded($cart));
                $user = Auth::user();

                //Registro del log con el nombre de usuario y detalles del pedido
                $mensaje = 'El usuario ' . $user->name . ' con id ' . $user->id . ' ha realizado el pedido número ' . $order->id . ' correctamente';
                Log::info($mensaje);
                return redirect()->route('order.lista-user');
            }
            return redirect()->route('cartuser.index',[
                'stock' => 0,
                'mayor0' => 1,
                'itemid' => $order->id
            ]);
        }
    }

    public function render()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        return view('livewire.check-cart',[
            'cart' => $cart,
            'user' => $user
        ]);
    }
}
