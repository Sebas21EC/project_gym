<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">

    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha de pago</th>
            <th scope="col">Descripción</th>
            <th scope="col">Monto</th>
            <th scope="col">Método de pago</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $payment)
            <tr>
                <th scope="row">{{ $payment->id }}</th>
                <td>{{ $payment->date_payment }}</td>
                <td>{{ $payment->description }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ $payment->updated_at }}</td>

                <td>
                    <a href="{{ route('payments.edit', ['payment' => $payment->id]) }}" class="btn btn-primary btn-sm">
                        <i class="far fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $payment->id }}">
                    <i class="far fa-trash-alt"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $payment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar el pago
                                    <strong>{{ $payment->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('payments.destroy', ['payment' => $payment->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Sí, eliminar pago</button>
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
