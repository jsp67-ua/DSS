@extends('theme.main')

@section('title', 'LISTADO DE TIPOS DE COMPONENTES')

@section('content')
<div class="navbar navbar-expand-lg bg-dark">
        <label class="font-weight-bold h2 text-center mx-auto text-white">Listado de los tipos de Componentes</label>
</div>
<div class="card-body">
    <section class="section-name padding-y-sm">
        <div class="container">
            <div class="row">
                @foreach($types as $item)
                    <div class="col-6 col-md-3" style="padding-top: 20px;">
                        <div class="card card-product-grid text-center">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <a href="{{ route('type.listaProductsType', $item) }}" class="btn btn-info">Ver Productos</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> <!-- row.// -->
        </div><!-- container // -->
    </section>
</div>
@endsection