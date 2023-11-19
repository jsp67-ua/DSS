@extends('theme.main')

@section('title', 'LISTADO DE CARRITO')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Mi carrito</h2></div>
    <div class="card-body">
        <br/>
        <br/>
        <div class="table-responsive">
            <livewire:cart-user />
        </div>

    </div>
</div>
@endsection