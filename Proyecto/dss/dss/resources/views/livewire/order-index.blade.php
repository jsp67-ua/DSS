<div>
    <div class="row">
        <div class="col-md-8">
        <label class="font-weight-bold h4" for="busqueda">Buscar Pedidos</label></br>
            <input type="search" name="" id="" placeholder=" Escribe aqui..." class="form-control border border-dark" wire:model="search">
            </br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Método de pago</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($orders as $item)
            <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->getUser()->name }}</td>
                <td> {{ $item->status }} </td>
                <td> {{ $item->payment_method }} </td>
                <td> {{ $item->total }} </td>

                <td>
                    <a href=" {{ route('order.show', $item) }} " title="Ver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
</div>
