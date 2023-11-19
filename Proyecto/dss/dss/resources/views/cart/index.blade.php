@extends('theme.superuser')

@section('title', 'LISTADO DE CARRITOS')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Carritos CRUD</h2></div>
    <div class="card-body">
        <!–– Aqui no hay boton de añadir, no se crean carritos solos, se crean al crear un usuario ––>
        <br/>
        <br/>
        <div class="table-responsive">
        <livewire:cart-index />
        </div>

    </div>
</div>
@endsection