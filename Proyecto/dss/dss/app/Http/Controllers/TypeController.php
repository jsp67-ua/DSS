<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
USE Illuminate\Validation\Rule;

class TypeController extends Controller
{
    // Aqui el CRUD de type para admin

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Type::all();
        return view('type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( TypeRequest $request )
    {
        $datos = $request->validated();
        $type = Type::create( $datos );
        
        return redirect()->route('type.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        $datos = $request->validated();
        $type->update( $datos );
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $products = $type->getProducts();
        $carts = Cart::all();
        foreach($products as $p)
        {
            foreach($carts as $item)
            {
                $lines = $item->getCartLines();
                foreach($lines as $line)
                {
                    if($line->product_id == $p->id)
                    {
                        $line->delete();
                        $item->updateTotal();
                    }
                }
            }
            $p->delete();
        }
        $type->delete();
        return redirect()->route('type.index');
    }

    //Aqui la página normal

    public function lista()
    {
        $types = Type::all();
        return view('type.componentes_card',compact('types'));
    }

    public function listaProductsType(Type $type)
    {
        $products = Product::where('type_id', $type->id)->get();
        return view('type.listaProductsType', compact('products', 'type'));
    }
}
