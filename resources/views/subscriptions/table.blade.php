<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Clienta</th>
            <th scope="col">Tipo de membresía</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de fin</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscriptions as $subscription)
            <tr>
                <th scope="row">{{ $subscription->id }}</th>
                <td>{{ $subscription->partner->name }}</td>
                <td>{{ $subscription->subscriptionType->name }}</td>
                <td>{{ \Carbon\Carbon::parse($subscription->start_date)->format('Y-m-d')}}</td>
                <td>{{ \Carbon\Carbon::parse($subscription->end_date)->format('Y-m-d')}}</td>
                <td>{{ $subscription->state }}</td>
                <td>{{ $subscription->created_at }}</td>
                <td>{{ $subscription->updated_at }}</td>
                <td>
                <a href="{{ route('subscriptions.edit', ['subscription' => $subscription->id]) }}" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $subscription->id }}">
                    <i class="far fa-trash-alt"></i>
                </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $subscription->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar suscripción</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar la suscripción
                                    <strong>{{ $subscription->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('subscriptions.destroy', ['subscription' => $subscription->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Sí, eliminar suscripción</button>
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
