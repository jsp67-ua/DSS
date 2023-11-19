@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE CARRITO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del carrito del usuario:
    </br>
    <h5> {{ $cart->getUser()->name}} </h5>
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
          @foreach( $cart->getCartLines() as $item )
            <tr>
              <td> {{ $item->getProduct()->id }} </td>
              <td> {{ $item->getProduct()->name }} </td>
              <td> {{ $item->getProduct()->price }}€ </td>
              <td> {{ $item->amount }} </td>
              <td> {{ $item->total }}</td>
            
              <td>
                <form action=" {{ route('cartline.destroy', $item) }}" method="POST">
                  @csrf
                  @method('delete')
                  <a href="{{ route('cartline.destroy', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="far fa-trash" aria-hidden="true">Eliminar</button></a>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <p class="card-text font-weight-bold h4">Total: </p>
      {{ $cart->updateTotal() }}
      <p class=" card-text h5"> {{ $cart->total }}€</p> </br>
    </div>
    <form action=" {{ route('cart.destroy', $cart) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('cart.destroy', $cart) }}" title="Vaciar"><button type="submit" class="btn btn-danger" title="Vaciar"><i class="fa fa-eye" aria-hidden="true">Vaciar</button></a>
    </form>
  </div>
</div>
<a href="{{ route('cart.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection