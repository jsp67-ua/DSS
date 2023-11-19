@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE PROVEEDOR')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del proveedor:
    </br> <h5> {{ $supplier->name }} </h5>
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-title font-weight-bold h3">Nombre:</p>
      <p class="card-text h4"> {{ $supplier->name }}</p> </br>
      <p class="card-title font-weight-bold h4">Descripción: </p>
      <textarea readonly rows="8" class="form-control"> {{ $supplier->description }}</textarea> </br>
      <p class="card-text font-weight-bold h4">Correo electrónico: </p>
      <p class=" card-text h5"> {{ $supplier->email }}</p> </br>
      <p class="card-text font-weight-bold h4">Teléfono: </p>
      <p class="card-text h5"> {{ $supplier->phone }}</p>
    </div>
    <a href="{{ route('supplier.edit', $supplier) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
    <form action=" {{ route('supplier.destroy', $supplier) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('supplier.destroy', $supplier) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
    </form>
  </div>
</div>
<a href="{{ route('supplier.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection