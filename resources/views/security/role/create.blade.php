<x-app-layout>

    <div class="container">
        <h2>Crear rol</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="role_name">Nombre:</label>
                <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Ingresar el nombre del rol" required>
                <label for="is_active">Estado:</label><br>
                <select name="is_active" id="is_active" class="form-control">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Crear</button>
        </form>
    </div>
</x-app-layout>