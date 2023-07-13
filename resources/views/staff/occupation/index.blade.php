<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ocupaciones') }}
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
                    <div class="container">
                        <table class="table">
                            <form action="{{ route('occupation.create') }}" method="GET">
                                <button type="submit" class="btn btn-success text-black">Crear</button>
                            </form>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($occupations as $occupation)
                                <tr>
                                    <th scope="row">{{ $occupation->id }}</th>
                                    <td>{{ $occupation->name }}</td>
                                    <td>{{ $occupation->created_at }}</td>
                                    <td>{{ $occupation->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('occupation.edit', ['occupation' => $occupation->id]) }}" class="btn btn-primary">Editar</a>

                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $occupation->id }}">Eliminar</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{ $occupation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar ocupacion</h5>
                                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar la ocupacion
                                                        <strong>{{ $occupation->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">No,
                                                            cancelar</button>
                                                        <form action="{{ route('occupation.destroy', ['occupation' => $occupation->id]) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary text-black">Sí, eliminar
                                                                ocupacion</button>
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