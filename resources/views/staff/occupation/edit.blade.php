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

        <form action="{{ route('occupation.update', $occupation->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $occupation->name }}"
                    required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success text-black">Actualizar</button>
        </form>
    </div>
    </x-app-layout>