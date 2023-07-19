<x-app-layout>

    <div class="container">
        <h2>Crear Categoría</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('occupation.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar el nombre de la ocupaciona" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Crear</button>
        </form>
    </div>
</x-app-layout>