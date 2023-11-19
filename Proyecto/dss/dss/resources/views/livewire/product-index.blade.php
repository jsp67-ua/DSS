<div>
    <div class="row">
        <div class="col-md-8">
            <label class="font-weight-bold h4" for="busqueda">Buscar productos</label></br>
            <input type="search" name="" id="" placeholder=" Escribe aqui..." class="form-control border border-dark" wire:model="search">
            </br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Existencias</th>
                <th>Tipo</th>
                <th>Proveedores</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $products as $item )
            <tr>
                <td>{{ $item->id }}</td>
                <td><img src=" {{ $item->image }}" width="100px;" ></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}€</td>
                <td>{{ $item->stock }}</td>
                <td>
                    {{ $item->getTypes()->name }}
                </td>
                <td>
                    <?php
                        $s = $item->suppliers()->get();
                    ?>
                    @if(sizeof($s) < 1)
                        ninguno
                    @elseif(sizeof($s) < 3)
                        @foreach( $s as $key )
                            ( {{ $key->name }} )
                        @endforeach
                    @else
                        {{ sizeof($s) }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('product.show', $item) }}" title="Ver"><button class="btn btn-primary"><i class="far fa-eye" aria-hidden="true"></i>Ver</button></a>
                    <a href="{{ route('product.edit', $item) }}" title="Editar"><button class="btn btn-warning"><i class="far fa-edit" aria-hidden="true"></i>Editar</button></a>
                    <form action=" {{ route('product.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('product.destroy', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="far fa-trash" aria-hidden="true">Eliminar</button></a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>