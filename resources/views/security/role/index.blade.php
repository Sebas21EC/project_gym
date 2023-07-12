<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <table class="table table-">

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @error('color')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            @if (session('success'))
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                            @endif
                            
                            <thead class="thead-dark ">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Creado el</th>
                                    <th scope="col">Actualizado el</th>

                                    
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->role_name }}</td>
                                    <td>{{ $role->is_active==1?'SI':'NO' }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    
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