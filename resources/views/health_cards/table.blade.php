<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">
    <thead class="thead-dark">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Clienta</th>
            <th scope="col">Nivel de Actividad</th>
            <th scope="col">Frecuencia de Alimentación</th>
            <th scope="col">Intolerancias</th>
            <th scope="col">Alergias</th>
            <th scope="col">Preparación de Alimentos</th>
            <th scope="col">Patología</th>
            <th scope="col">Patología Familiar</th>
            <th scope="col">Medicación</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($healthCards as $healthCard)
            <tr>
                <th scope="row">{{ $healthCard->id }}</th>
                <td>{{ $healthCard->partner->name }}</td>
                <td>{{ $healthCard->activity_level }}</td>
                <td>{{ $healthCard->feeding_frequency }}</td>
                <td>{{ $healthCard->intolerances }}</td>
                <td>{{ $healthCard->allergies }}</td>
                <td>{{ $healthCard->food_preparation }}</td>
                <td>{{ $healthCard->pathology }}</td>
                <td>{{ $healthCard->family_pathology }}</td>
                <td>{{ $healthCard->medication }}</td>
                <td>{{ $healthCard->created_at }}</td>
                <td>{{ $healthCard->updated_at }}</td>
                <td>
                <a href="{{ route('healthCards.edit', ['healthCard' => $healthCard->id]) }}" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $healthCard->id }}">
                    <i class="far fa-trash-alt"></i>
                </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $healthCard->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar máquina</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar la máquina
                                    <strong>{{ $healthCard->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('healthCards.destroy', ['healthCard' => $healthCard->id]) }}" method="POST">
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
