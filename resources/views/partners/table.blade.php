<table class="table table-hover display my-custom-table" style="margin-top: 60px;" id="table_id">
    <thead class="thead-dark">
        <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">Edad</th>
            <th scope="col">Ocupación</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fecha de Ingreso</th>
            <th scope="col">Actualizado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($partners as $partner)
            <tr>
                <th scope="row">{{ $partner->id }}</th>
                <td>{{ $partner->name }}</td>
                <td>{{ $partner->phone }}</td>
                <td>{{ $partner->address }}</td>
                <td>{{ $partner->birth_date->diffInYears(\Carbon\Carbon::now()) }} años</td>
                <td>{{ $partner->occupation }}</td>
                <td>{{ $partner->email }}</td>
                <td>{{ $partner->type }}</td>
                <td>{{ \Carbon\Carbon::parse($partner->created_at)->format('Y-m-d')}}</td>
                <td>{{ $partner->updated_at }}</td>
                <td>
                <div class="btn-group">
                    
                <a href="{{ route('partners.edit', ['partner' => $partner->id]) }}" class="btn btn-primary btn-sm">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $partner->id }}">
                    <i class="far fa-trash-alt"></i>
                </button>

                
                <a href="{{ route('partners.edit', ['partner' => $partner->id]) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-chart-bar"></i>
                </a>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $partner->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Clienta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro de que desea eliminar a la clienta
                                    <strong>{{ $partner->name }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No, cancelar</button>
                                    <form action="{{ route('partners.destroy', ['partner' => $partner->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">Sí, eliminar clienta</button>
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
