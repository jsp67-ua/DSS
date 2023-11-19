<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index');
    }

    public function indexUser()
    {
        $carts = Order::where('user_id', Auth::user());
        return view('orderuser.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $datos = $request->validated();
        $order = Order::create($datos);
        return redirect()->route('order.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::user()->admin){
            return view('order.show', ['order' => $order]);
        } else {
            $this->showuser($order);
        }
    }

    public function showuser(Order $order)
    {
        return view('orderuser.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        $datos = $request->validated();
        $order->update($datos);
        return redirect()->route('order.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }

    public function lista(Order $order)
    {
        //logear automaticamente el usuario 3
        //Auth::loginUsingId(3);
        $user = Auth::user();
        //auth()->logout();

        //controlar que esta logeado el usuario
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            //devolver las ordenes del ususario logeado
            $orders = Order::where('user_id', $user->id)->get();
            return view('order.lista-user', ['orders' => $orders]);
        } else {
            return view('order.lista-user');

        }

    }


}