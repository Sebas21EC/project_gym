<x-app-layout>
    <div class="container">
        <h2>Editar Rol</h2>

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
                <label for="role_name">Nombre del rol:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $role->role_name }}" required>
                <label for="is_active">Estado:</label><br>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1" {{ $role->is_active == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $role->is_active == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Actualizar</button>
        </form>
    </div>
</x-app-layout>