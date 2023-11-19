@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE PEDIDO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del pedido {{ $order->id }} del usuario:
    </br>
    <h5> {{ $order->getUser()->name}} </h5>
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-text h4">Productos: </p> </br>
      <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
              <th>Id</th>
              <th>Nombre Producto</th>
              <th>Precio Producto</th>
              <th>Cantidad</th>
              <th>Total Linea</th>
              <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
          @foreach( $order->getOrderLines() as $item )
            <tr>
              <td> {{ $item->getProduct()->id }} </td>
              <td> {{ $item->getProduct()->name }} </td>
              <td> {{ $item->getProduct()->price }}€ </td>
              <td> {{ $item->amount }} </td>
              <td> {{ $item->total }}</td>
            
              <td>
                Sin opciones
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <p class="card-text font-weight-bold h4">Total: </p>
      {{ $order->updateTotal() }}
      <p class=" card-text h5"> {{ $order->total }}€</p> </br>
    </div>
  </div>
</div>
<a href="{{ route('order.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection