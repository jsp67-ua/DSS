@extends('theme.superuser')

@section('title', 'EDICIÓN DE PROVEEDOR')

@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header text-center font-weight-bold h3">Editar Proveedor <h2> {{ $supplier->name }} </h2></div>
  <div class="card-body">
    <form action="{{ route('supplier.update', $supplier) }}" method="POST">
      @method('put')
      <x-supplier-form-body :supplier="$supplier"/>
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
<a href="{{ route('supplier.index') }}" class="" title="Volver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
@endsection