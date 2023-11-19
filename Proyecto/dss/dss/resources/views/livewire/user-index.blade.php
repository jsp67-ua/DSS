<div>
    <div class="row">
        <div class="col-md-8">
            <label class="font-weight-bold h4" for="busqueda">Buscar usuarios</label></br>
            <input type="search" name="" id="" placeholder="Escribe aqui..." class="form-control border border-dark" wire:model="search">
            </br>
        </div>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Correo Electrónico</th>
                <th>Administrador</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    @if($item->admin == 0)
                        NO
                    @else
                        SI
                    @endif
                </td>

                <td>
                    <a href="{{ route('user.show', $item) }}" title="Ver"><button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                    <a href="{{ route('user.edit', $item) }}" title="Editar"><button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button></a>
                    <form action=" {{ route('user.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('user.destroy', $item) }}" title="Eliminar"><button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa fa-eye" aria-hidden="true">Eliminar</button></a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>