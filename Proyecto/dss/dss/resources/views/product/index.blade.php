@extends('theme.superuser')

@section('title', 'LISTA DE PRODUCTOS')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Productos CRUD</h2></div>
    <div class="card-body">
        <a href="{{ route('product.create') }}" class="btn btn-succes btn-sm" title="Añadir">
            <button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>Añadir</button>
        </a>
        <br/>
        <br/>
        <div class="table-responsive">
            <livewire:product-index />
        </div>

    </div>
</div>
@endsection