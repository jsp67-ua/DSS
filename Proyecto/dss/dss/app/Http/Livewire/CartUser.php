<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartLine;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartUser extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    public $paginacion = 10;
    protected $queryString = 
    [
        'paginacion' => ['except' => 10, 'as' => 'page'],
    ];
    public function render(Request $request)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        Log::info('El usuario ha entrado en su carrito', ['user_id' => $user->id, 'email' => $user->email,'cart' => $cart->id]);
        if($request->query('itemid') == null){
            $cartlineid = -1;
        } else{
            $cartlineid = $request->query('itemid');
        }
        $cartlines = CartLine::where('cart_id', $cart->id)->first();
        if($cartlines == null){
            return view('livewire.cart', [
            'carts'  => $cart,
            ]);
        } else{
            return view('livewire.cart', [
            'carts'  => $cart,
            'cartlines'  => CartLine::where('cart_id', $cart->id)->paginate($this->paginacion),
            'stock' => $request->query('stock'),
            'mayor0' => $request->query('mayor0'),
            'cartlineid' => $cartlineid
            ]);
        }
        
    }
}
