<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Duración (Meses)</th>
            <th scope="col">Precio</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscriptionTypes as $subscriptionType)
            <tr>
                <th scope="row">{{ $subscriptionType->id }}</th>
                <td>{{ $subscriptionType->name }}</td>
                <td>{{ $subscriptionType->n_months }}</td>
                <td>{{ $subscriptionType->price }}</td>
                <td>{{ $subscriptionType->created_at }}</td>
                <td>{{ $subscriptionType->updated_at }}</td>
                <td>
                <a href="{{ route('subscriptionTypes.edit', ['subscriptionType' => $subscriptionType->id]) }}" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $subscriptionType->id }}">
                    <i class="far fa-trash-alt"></i>
                </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $subscriptionType->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar tipo de suscripción</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar el tipo de suscripción
                                    <strong>{{ $subscriptionType->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('subscriptionTypes.destroy', ['subscriptionType' => $subscriptionType->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Sí, eliminar tipo de suscripción</button>
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
