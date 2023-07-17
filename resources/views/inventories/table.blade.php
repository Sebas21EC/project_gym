<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Máquina</th>
            <th scope="col">Detalle</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Precio Total</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inventories as $inventory)
            <tr>
                <th scope="row">{{ $inventory->id }}</th>
                <td>{{ $inventory->machine }}</td>
                <td>{{ $inventory->detail }}</td>
                <td>{{ $inventory->quantity }}</td>
                <td>{{ $inventory->unit_price }}</td>
                <td>{{ $inventory->total_price }}</td>
                <td>{{ $inventory->state }}</td>
                <td>{{ $inventory->created_at }}</td>
                <td>{{ $inventory->updated_at }}</td>
                <td>
                <a href="{{ route('inventories.edit', ['inventory' => $inventory->id]) }}" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $inventory->id }}">
                    <i class="far fa-trash-alt"></i>
                </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $inventory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar máquina</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar la máquina
                                    <strong>{{ $inventory->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('inventories.destroy', ['inventory' => $inventory->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Sí, eliminar máquina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
