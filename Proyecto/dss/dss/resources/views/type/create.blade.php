@extends('theme.superuser')

@section('title', 'CREACIÓN DE CATEGORÍA')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Crear Nuevo Tipo</div>
  <div class="card-body">
    <form action="{{ route('type.store') }}" method="POST">
      <x-type-form-body/>
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
