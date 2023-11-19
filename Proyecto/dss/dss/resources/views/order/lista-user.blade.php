@extends('theme.main')

@section('title', 'MIS PEDIDOS')

@section('content')
    <div class="card-header text-center">
        <h3>Mis pedidos</h3>
    </div>
    <div class="card-body">
        <section class="section-name padding-y-sm">
            <div class="row d-flex justify-content-end">
                @if (Auth::check())
                    @if ($orders->count() > 0)
                        <div class="container">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->created_at }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ route('order.show-user', $order->id) }}"
                                                    class="btn btn-sm btn-info">Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Agrega aquí más información del pedido -->
                    @else
                    <div class="card-text text-center">
                        <p class="h3 text-dark">No se ha realizado ningún pedido todavía.</p>
                    </div>
                    @endif
                @else
                    <p>Debes iniciar sesión para ver tus pedidos.</p>
                    <td>
                        <div class="btn-group">

                            <a href="{{ route('order.index') }}" class="btn btn-sm btn-info">Iniciar sesión</a>
                        </div>
                    </td>
                @endif

            </div>
            <div class="container">
                <div class="row">

                </div> <!-- row.// -->
            </div><!-- container // -->
        </section>
    </div>
@endsection
