@extends('theme.main')

@section('title', 'MIS PEDIDOS')

@section('content')
    <div class="card" style="margin:20px;">
        <div class="container">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="card-header text-center font-weight-bold h3">Pedido nº:
                            {{ $order->id }}</th>
                        <th class="card-header text-center font-weight-bold h3">Usuario:
                            {{ $order->getUser()->name }}
                        </th>
                        <th class="card-header text-center font-weight-bold h3">Fecha:
                            {{ $order->created_at->format('d-m-Y') }}</th>
                    </tr>
                </thead>
            </table>
            <div class="card-body">
                <div class="card-body">
                    <p class="card-text h4">Productos: </p>
                    <div class="container">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre Producto</th>
                                    <th>Precio Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total Linea</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->getOrderLines() as $item)
                                    <tr>
                                        <td> {{ $item->getProduct()->id }} </td>
                                        <td> {{ $item->getProduct()->name }} </td>
                                        <td> {{ $item->getProduct()->price }}€ </td>
                                        <td> {{ $item->amount }} </td>
                                        <td> {{ $item->total }}</td>

                                        <td>
                                            Sin opciones
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="card-text font-weight-bold h4">Total: </p>
                    {{ $order->updateTotal() }}
                    <p class=" card-text h5"> {{ $order->total }}€</p>
                    <a href="{{ route('order.lista-user') }}" class="" title="Volver"><button class="btn btn-primary"
                            style="float: right"><i class="fa fa-eye" aria-hidden="true"></i>Volver</button></a>
                    <br> <br>
                    <br> <br>
                </div>

            </div>

        </div>

    </div>

@endsection
