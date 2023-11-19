@extends('theme.superuser')

@section('title', 'CREACIÓN DE USUARIO')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Crear Nuevo Usuario</div>
  <div class="card-body">
    <form action="{{ route('user.store') }}" method="POST">
      <x-user-form-body/>
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
@endsection