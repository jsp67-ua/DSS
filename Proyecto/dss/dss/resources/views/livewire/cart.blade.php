<div>
    @if (!empty($cartlines))
    <h2>Productos</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre del producto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total de línea</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartlines as $item)
                <tr>
                    <td>{{ $item->getProduct()->name }}</td>
                    <td>{{ $item->getProduct()->description }}</td>
                    <td>{{ $item->getProduct()->price }}</td>
                    <form action=" {{ route('cartline.update', $item->id) }}" method="POST">
                    <td>
                        @if($item->getProduct()->stock < $item->amount)
                            {{$item->amount = $item->getProduct()->stock}}
                        @endif
                        <input value="{{ old('cantidad') ?? $item->amount }}" class="form-control" min="1" max="{{ $item->getProduct()->stock }}" type="number" id="amount" name="amount" placeholder="{{ old('cantidad') ?? $item->amount }}" required style="width: 100px;" aria-readonly="true" onkeydown="return false" value="1">
                    </td>
                    <td>{{ $item->total }} <br />
                    @if($cartlineid == $item->id)
                    @if($stock == 0)
                    <a style="color: red; font-weight: bold;">No hay stock suficiente</a> <br />
                    @endif
                    @if($mayor0 == 0)
                    <a style="color: red; font-weight: bold;">El valor tiene que ser mayor que 0.</a>
                    @endif
                    @endif
                    </th>
                    <td>
                        @csrf
                        @method('PUT')
                        <a title="Actualizar"><button type="submit" class="btn btn-info" title="Actualizar"><i class="fa fa-eye" aria-hidden="true">Actualizar cantidad</button></a>
                        </form>
                        <form action=" {{ route('cartline.destroyuser', $item) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{ route('cartline.destroyuser', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: right;">
        <ul style="font-size: 20px;font-weight: bold;">Total = {{ $carts->total }} €</ul>
        <a href="{{ route('check.index') }}" title="Comprar"><button type="submit" class="btn btn-warning" title="Comprar"><i class="fa fa-eye" aria-hidden="true">Comprar</button></a>
    </div>
    {{ $cartlines->links() }}
    @else
        <tr>
            <div class="card-text text-center">
            <td colspan="3"><p class="h3 text-dark">No hay ningún producto en el carrito.</p></td>
            </div>
        </tr>
        <div class="text-center"><a href="{{ route('type.lista') }}" title="productos"><button type="submit" class="btn btn-danger" title="productos"><i class="fa fa-eye" aria-hidden="true">Ir a la página de productos</button></a></div>
    @endif
</div>
