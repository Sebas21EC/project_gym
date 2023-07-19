<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulos') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <form action="{{ route('module.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-success">Crear</button>
                    </form>

                    <div class="container">
                        <table class="table table-hover display" id="table_id">



                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Module</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($modules as $module)
                                <tr>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->description }}</td>
                                    <td>{{ $module->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                                    <td>
                                        @foreach ($module->roles as $role)
                                        {{ $role->role_name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('module.edit', ['module' => $module->id]) }}" class="btn btn-primary">Editar</a>

                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $module->id }}">Desactivar</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $module->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Desactivar</h5>
                                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea desactivar el módulo?
                                                        <strong>{{ $module->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">No,
                                                            cancelar</button>
                                                        <form action="{{ route('module.destroy', ['module' => $module->id]) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary text-black">Sí, desactivar
                                                                rol</button>
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
                    </div>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>