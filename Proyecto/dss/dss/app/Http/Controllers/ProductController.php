<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
USE Illuminate\Validation\Rule;
use App\File;
use App\Models\Cart;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $types = Type::all();
        return view('product.create',compact('suppliers', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ProductRequest $request )
    {
        $datos = $request->validated();
        $supplier = $request->supplier;

        if($request->image == null)
        {
            $datos["image"] = '/images/sinimagen.jpeg';
        }
        else
        {
            $imagenes = $request->file("image")->store('public/imagenes');
            $url = Storage::url($imagenes);
            $datos["image"] = $url;
        }

        $product = Product::create( $datos );
        $product->suppliers()->attach( $supplier );

        return redirect()->route('product.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $suppliers = $product->suppliers()->get();
        return view('product.show', compact('product', 'suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $suppliers = $product->suppliers()->get();
        return view('product.edit', compact('product', 'suppliers', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $datos = $request->validated();
        $supplier = $request->supplier;

        if($request->image == null)
        {
            $datos["image"] = $product->image;
        }
        else
        {
            $imagenes = $request->file("image")->store('public/imagenes');
            $url = Storage::url($imagenes);
            $datos["image"] = $url;
        }

        $product->update( $datos );
        $product->suppliers()->sync( $supplier );
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $carts = Cart::all();
        foreach($carts as $item)
        {
            $lines = $item->getCartLines();
            foreach($lines as $line)
            {
                if($line->product_id == $product->id)
                {
                    $line->delete();
                    $item->updateTotal();
                }
            }
        }
        $product->delete();
        return redirect()->route('product.index');
    }

    public function productUserShow(Product $product)
    {
        return view('product.productUserShow', compact('product'));
    }

    public function productList()
    {
        return view('product.productList');
    }
}
