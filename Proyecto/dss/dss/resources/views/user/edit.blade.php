@extends('theme.superuser')

@section('title', 'EDICIÓN DE USUARIOS')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">Edit User <h2> {{ $user->name }} </h2></div>
  <div class="card-body">
    <form action="{{ route('user.update', $user) }}" method="POST">
      @method('put')
      <x-user-form-body :user="$user"/>
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
<a href="{{ route('user.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection