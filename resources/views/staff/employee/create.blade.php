<x-app-layout>
    <div class="container">
        <h2>Editar empleado</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<!-- 
        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
            <label for="name">Identificacion:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
                <label for="name">Apellido:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
                <label for="occupation">Categoria:</label>
                <select name="occupation" id="occupation" class="form-control" required>
                    @foreach ($categories as $occupation)
                    @if ($occupation->status == 1)
                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form> -->
    </div>
</x-app-layout>