@extends('theme.superuser')

@section('title', 'LISTA DE USUARIOS')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Usuarios CRUD</h2></div>
    <div class="card-body">
        <a href="{{ route('user.create') }}" class="btn btn-succes btn-sm" title="Añadir">
            <button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>Añadir</button>
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <livewire:user-index />
        </div>
    </div>
</div>
@endsection