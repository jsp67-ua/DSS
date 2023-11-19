@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE PEDIDO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">Order Page <h2> {{ $order->id }} </h2></div>
    <div class="card-body">
      <div class="card-body">
        <!--<h5 class="card-title">Total : {{ $order->total }}</h5>-->
        <h5 class="card-title">Order data</h5>
        <p class="card-title">Name : {{ $order->getProduct()->name}}</p>
        <!--<p class="card-title">Description : {{ $order->getProduct()->description}}</p>-->
        <p class="card-title">Price : {{ $order->total}}</p>
        <!--<p class="card-title">Stock : {{ $order->getProduct()->stock}}</p>-->
        <p class="card-title">Payment method : {{ $order->payment_method}}</p>
        <p class="card-title">Status : {{ $order->status}}</p>

        <div class="card-body">
          <form action="{{ route('order.update', $order) }}" method="POST">
            @method('put')
            <x-order-form-body :order="$order"/>


          </form>


        </div>


      

    </div>
    <form action=" {{ route('order.destroy', $order) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('order.destroy', $order) }}" title="Delete Order"><button type="submit" class="btn btn-danger btn sm" title="Delete Order"><i class="fa fa-eye" aria-hidden="true">Delete</button></a>
    </form>
   
  </div>
 
</div>
<a href="{{ route('order.index') }}" class="btn btn-succes btn-sm" title="Add New Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Return</button></a>

@endsection