@extends('theme.main')

@section('title', 'LISTA DE PRODUCTOS')

@section('content')
<div class="navbar navbar-expand-lg bg-dark">
        <label class="font-weight-bold h2 text-center mx-auto text-white">Listado de Productos</label>
</div>
<div class="table-responsive">
    <livewire:product-list />
</div>
@endsection