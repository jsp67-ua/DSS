@extends('theme.main')

@section('title', 'PERFIL')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Perfil del usuario:
    </br> 
    <h5> {{ auth()->user()->name }} </h5> 
  </div>
  <div class="card-body">
    <div class="card-body">
      <p class="card-title font-weight-bold h3">Nombre:</p>
      <p class="card-text h4"> {{ auth()->user()->name }}</p> </br>
      <p class="card-title font-weight-bold h4">Dirección: </p>
      <textarea readonly rows="3" class="form-control"> {{ auth()->user()->address }} </textarea> </br>
      <p class="card-text font-weight-bold h4">Correo Electrónico: </p>
      <p class=" card-text h5"> {{ auth()->user()->email }}</p> </br>
      </br>
    </div>   
  </div>
</div>
@endsection
