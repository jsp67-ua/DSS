@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE PRODUCTO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del producto:
    </br> 
    <h5> {{ $product->name }} </h5>
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-title font-weight-bold h3">Nombre:</p>
      <p class="card-text h4"> {{ $product->name }}</p> </br>
      <p class="card-title font-weight-bold h4">Descripción: </p>
      <textarea readonly rows="8" class="form-control"> {{ $product->description }} </textarea> </br>
      <p class="card-text font-weight-bold h4">Precio: </p>
      <p class=" card-text h5"> {{ $product->price }}€</p> </br>
      <p class="card-text font-weight-bold h4">Existencias: </p>
      <p class="card-text h5"> {{ $product->stock }}</p> </br>
      <p class="card-text font-weight-bold h4">Tipo: </p>
      <p class="card-text h5"> {{ $product->getTypes()->name }}</p> </br>
      <p class="card-text h4 font-weight-bold">Proveedores</p>
      <label class="form-control">
        @if(sizeof($suppliers) < 1)
          <h5>Todavía no se conocen proveedores para este producto ...</h5>
        @else
          @foreach( $suppliers as $key )
            <a class="btn btn-primary text-white" style="pointer-events: none;">
              {{ $key->name }} 
            </a>
          @endforeach
        @endif
      </label>
    </div>
    <a href="{{ route('product.edit', $product) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
    <form action=" {{ route('product.destroy', $product) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('product.destroy', $product) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
    </form>
  </div>
</div>
<a href="{{ route('product.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection