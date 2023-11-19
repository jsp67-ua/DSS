@extends('theme.superuser')

@section('title', 'INFORMACIÓN DE USUARIO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Página del usuario:
    </br> 
    <h5> {{ $user->name }} </h5> 
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-title font-weight-bold h3">Nombre:</p>
      <p class="card-text h4"> {{ $user->name }}</p> </br>
      <p class="card-title font-weight-bold h4">Dirección: </p>
      <textarea readonly rows="3" class="form-control"> {{ $user->address }} </textarea> </br>
      <p class="card-text font-weight-bold h4">Correo Electrónico: </p>
      <p class=" card-text h5"> {{ $user->email }}</p> </br>
      <p class="card-text font-weight-bold h4">Admin: </p>
      <label class="form-control"> 
        @if($user->admin == 0)
          <a class="btn btn-primary text-white" style="pointer-events: none;">
            NO ES ADMIN
          </a>
        @else 
          <a class="btn btn-primary text-white" style="pointer-events: none;">
            SI ES ADMIN
          </a>
        @endif
      </label> 
      </br>
    </div>
    <a href="{{ route('user.edit', $user) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
    <form action=" {{ route('user.destroy', $user) }}" method="POST">
      @csrf
      @method('delete')
      <a href="{{ route('user.destroy', $user) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
    </form>
  </div>
</div>
<a href="{{ route('user.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection