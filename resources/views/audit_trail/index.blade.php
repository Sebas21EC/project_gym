<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auditoria') }}
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
                    <form action="{{ route('employee.create') }}" method="GET">
                        <button type="submit" class="btn btn-outline-success">Crear</button>
                    </form>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Auditor&iacute;a</h1>
                                <table class="table table-hover display" id="table_id">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"> Usuario</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Informaci&oacute;n </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($audits as $audit)
                                        <tr>
                                            <!-- <td scope="row">{{ $audit->user_id ? $audit->user->user_id : '-' }}</td> -->
                                            <td>{{ $audit->user ? $audit->user->name : '-' }}
                                                <!-- {{ $audit->user ? $audit->user->name : '-' }} -->
                                            </td>
                                            </td>
                                            <td>{{ $audit->user ? $audit->user->email : '-' }}</td>
                                            <td>{{ $audit->event }}</td>
                                            <td>
                                                <input type="datetime" readonly value="{{ $audit->created_at }}">
                                            </td>
                                            <td>{{ $audit->old_values || $audit->new_values ? $audit->old_values . ' - ' . $audit->new_values : '-' }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
</x-app-layout>