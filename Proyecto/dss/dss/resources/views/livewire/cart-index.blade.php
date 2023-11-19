<div>
    <div class="row">
        <div class="col-md-8">
            <label class="font-weight-bold h4" for="busqueda">Buscar Carritos</label></br>
            <input type="search" name="" id="" placeholder=" Escribe aqui..." class="form-control border border-dark" wire:model="search">
            </br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Productos</th>
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($carts as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    {{ $item->getUser()->name }}
                </td>
                <td>
                    <?php
                        $u = $item->getCartLines();
                    ?>
                    @if(sizeof($u) < 1)
                        vacío
                    @else
                        {{ sizeof($u) }}
                    @endif
                </td>
                <td>{{ $item->total }}€</td>

                <td>
                    <a href="{{ route('cart.show', $item) }}" title="Ver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $carts->links() }}
</div>