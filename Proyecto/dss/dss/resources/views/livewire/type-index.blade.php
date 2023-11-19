<div>
    <div class="row">
        <div class="col-md-8">
            <label class="font-weight-bold h4" for="busqueda">Buscar tipos</label></br>
            <input type="search" name="" id="" placeholder=" Escribe aqui..." class="form-control border border-dark" wire:model="search">
            </br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad de Productos</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $types as $item )
            <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->description }} </td>
                <td>
                    <?php
                        $t = $item->getProducts();
                    ?>
                    @if(sizeof($t) < 1)
                        no hay productos todavía
                    @else
                        {{ sizeof($t) }}
                    @endif
                <td>
                    <a href="{{ route('type.show', $item) }}" title="Ver"><button class="btn btn-primary"><i class="far fa-eye" aria-hidden="true"></i>Ver</button></a>
                    <a href="{{ route('type.edit', $item) }}" title="Editar"><button class="btn btn-warning"><i class="far fa-edit" aria-hidden="true"></i>Editar</button></a>
                    <form action=" {{ route('type.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('type.destroy', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="far fa-trash" aria-hidden="true">Eliminar</button></a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $types->links() }}
</div>