@extends('theme.superuser')

@section('title', 'EDICIÓN DE PRODUCTO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Editar Producto:
  </br> <h5> {{ $product->name }} </h5>
  </div>
  <div class="card-body">
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
      @method('put')
      <x-product-form-body :product="$product" :suppliers="$suppliers" :types="$types"/>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
</div> 
<a href="{{ route('product.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-warning" aria-hidden="true"></i>Volver</button></a>
@endsection