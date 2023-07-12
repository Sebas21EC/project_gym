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
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
                <label class="form-check-label" for="role_status">Activo</label>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Crear</button>
        </form>
    </div>
</x-app-layout>