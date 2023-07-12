<x-app-layout>
<div class="container">
        <h2>Editar Categoria</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('role.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="role_name">Name:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->role_name }}"
                    required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Actualizar</button>
        </form>
    </div>
    </x-app-layout>