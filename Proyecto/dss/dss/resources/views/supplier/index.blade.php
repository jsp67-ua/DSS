@extends('theme.superuser')

@section('title', 'LISTADO DE PROVEEDORES')

@section('content')
<div class="card" style="margin:20px;">
    <div class="card-header text-center"><h2>Proveedores CRUD</h2></div>
    <div class="card-body">
        <a href="{{ route('supplier.create') }}" class="btn btn-succes btn-sm" title="Añadir">
            <button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>Añadir</button></a>
        <br/>
        <br/>
        <div class="table-responsive">
            <livewire:supplier-index />
        </div>

    </div>
</div>
@endsection