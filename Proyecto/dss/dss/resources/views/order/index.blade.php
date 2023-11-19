@extends('theme.superuser')

@section('title', 'LISTA DE PEDIDOS')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Pedidos CRUD</h2></div>
    <div class="card-body">
        <!–– Aqui no hay boton de añadir, no se crean carritos solos, se crean al crear un usuario ––>
        <br/>
        <br/>
        <div class="table-responsive">
        <livewire:order-index />
        </div>

    </div>
</div>
@endsection