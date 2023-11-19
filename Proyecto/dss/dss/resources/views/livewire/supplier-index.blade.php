<div>
    <div class="row">
        <div class="col-md-8">
        <label class="font-weight-bold h4" for="busqueda">Buscar proveedores</label></br>
            <input type="search" name="" id="" placeholder="Escribe aquí..." class="form-control border border-dark" wire:model="search"></br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suppliers as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>

                <td>
                    <a href="{{ route('supplier.show', $item) }}" title="Ver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                    <a href="{{ route('supplier.edit', $item) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    <form action=" {{ route('supplier.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('supplier.destroy', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $suppliers->links() }}
</div>