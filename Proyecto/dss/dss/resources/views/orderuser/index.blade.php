@extends('theme.main')

@section('title', 'LISTA DE PEDIDOS')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Mis pedidos</h2></div>
    <div class="card-body">
        <br/>
        <br/>
        <div class="table-responsive">
            <livewire:order-user-index />
        </div>

    </div>
</div>
@endsection