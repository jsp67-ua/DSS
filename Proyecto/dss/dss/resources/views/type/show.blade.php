@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE CATEGORÍA')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del tipo:
    </br> 
    <h5> {{ $type->name }} </h5>
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-title font-weight-bold h3">Nombre:</p>
      <p class="card-text h4"> {{ $type->name }}</p> </br>
      <p class="card-title font-weight-bold h4">Descripción: </p>
      <textarea readonly rows="8" class="form-control"> {{ $type->description }} </textarea> </br>
    <a href="{{ route('type.edit', $type) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
    <form action=" {{ route('type.destroy', $type) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('type.destroy', $type) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
    </form>
  </div>
</div>
<a href="{{ route('type.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection