@extends('theme.main')

@section('title', 'INFORMACIÓN DE PRODUCTO')

@section('content')
<div class="card-header text-center font-weight-bold h3 bg-white">Página del producto:
  </br> 
  <h5> {{ $product->name }} </h5>
</div>

<div class="card-body">
  <div class="card-body" style="padding-left: 50px;"> 
    <div class="d-flex justify-content-xl-start">
      <img class="border border-secondary" src=" {{ $product->image }}" width="500px;" height="500px;" >
      <div class="d-flex flex-column w-100" style="padding-left:150px;">
        <p class="card-text h1 font-weight-bold" style="padding-bottom: 20px;"> {{ $product->name }}</p> </br>
        <div class="d-flex justify-content-xl-start">
          <div class="d-flex flex-column" style="padding-left:25px;">
            <p class=" card-text h3 text-dark"> {{ $product->price }}€</p> </br>
            <p class="card-text font-weight-bold h4">Stock: </p> </br>
            @if ( $product->stock <= 0)
              <p class="card-text h4">SIN EXISTENCIAS</p> </br>
            @else
              <p class="card-text h4"> {{ $product->stock }}</p> </br>
            @endif
          </div>
            @auth
              <form action="{{route('cart.product', $product)}}" method="POST">
              @csrf
                <div class="d-flex flex-column w-100" style="padding-left:150px; padding-top: 65px;">
                  <div class="options" style="padding-bottom: 25px;">
                    <div class="d-inline-flex justify-content-xl-start" >
                      <p for="quantity" class="card-text font-weight-bold h5" style="padding-top: 5px; padding-right: 20px;">Cantidad:</p>
                      <input class="form-control" min="1" max="{{ $product->stock }}" type="number" id="quantity" name="quantity" placeholder="1" required style="width: 100px;" aria-readonly="true" onkeydown="return false" value="1">
                    </div>
                  </div>
                  <div>                    
                    <button type="submit" class="btn btn-warning" style="width: 150px;"> Añadir al carrito</button>
                  </div>
                </div>
              </form>
            @endauth
            @guest
              <div style="padding-left: 250px; padding-top: 100px;">
                <a href="{{ route('login') }}" class="btn btn-danger" style="width: 160px;height: 45px;">Compra ya</a>
              </div>
            @endguest
        </div>
        <p class="card-title font-weight-bold h4" style="padding-bottom: 20px;">Descripción: </p>
        <textarea readonly rows="5" class="form-control" style="padding-bottom: 20px;"> {{ $product->description }} </textarea> </br>
      </div>
    </div>
    <a href="/" class="" title="Volver"><button class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
  </div>
</div>
@endsection