@extends('theme.superuser')

@section('title', 'CREACIÓN DE PRODUCTO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Crear Nuevo Producto</div>
  <div class="card-body">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
      <x-product-form-body :suppliers="$suppliers"/>
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

<script>
  $('select').selectpicker();
</script>
@endsection
