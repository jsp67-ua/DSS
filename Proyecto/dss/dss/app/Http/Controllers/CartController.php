<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartLine;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    public function indexUser($stock = true,$mayor0 = true,$itemid = 0 )
    {
        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::user()->id);
            return view('cartuser.index');
        } else return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('cart.show', ['cart' => $cart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $lines = $cart->getCartLines();
        foreach($lines as $l)
        {
            $l->delete();
        }
        $cart->updateTotal();
        return redirect()->route('cart.index');
    }

    public function cartProduct(Request $request, Product $product)
    {
        $datos = $request->validate([
            'quantity' => 'required',' min:1', 'max:'.$product->stock,
        ]);
        $user = Auth::user()->id;
        $u = User::find($user);
        $l = Cart::where('user_id', $u->id)->first();
        if($l == null)
        {
            $l = Cart::create([
                'user_id' => $u->id,
            ]);
        }

        $cl = CartLine::create([
            'amount'        => $datos["quantity"],
            'product_id'    => $product->id,
            'cart_id'       => $l->id,
            'total'         => $datos["quantity"] * $product->price,
        ]);

        $l->updateTotal();
        return redirect()->route('cart.select');
    }

    public function select(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->admin){
                $carts = Cart::all();
                return redirect()->route('cart.index');
            }else{ return redirect()->route('cartuser.index');}
        } else return redirect()->route('login');
    }
}
