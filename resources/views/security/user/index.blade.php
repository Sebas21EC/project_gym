<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
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
                        <table class="table table-bordered">

                            <form action="{{ route('user.create') }}" method="GET">
                                <button type="submit" class="btn btn-outline-success">Crear</button>
                            </form>

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_active == 1 ? 'Activo' : 'Inactivo' }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                        {{ $role->role_name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('user.edit', [$user->id]) }}" method="GET">
                                            @csrf
                                            @method('GET')
                                            <button class="btn btn-outline-primary" type="submit">Editar</button>
                                        </form>
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