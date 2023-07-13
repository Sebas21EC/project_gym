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

        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
            <label for="identify">Identificacion:</label>
                <input type="text" class="form-control" id="identify" name="identify" value="{{ $employee->identify }}" required>
                <label for="first_name">Nombre:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
                <label for="last_name">Apellido:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
                <label for="occupation">Ocupaciones:</label>
                <select name="occupation" id="occupation" class="form-control" required>
                    @foreach ($occupations as $occupation)
                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                    @endforeach
                </select>
                <label for="phone">Telefono:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" required>
                <label for="address">Direccion:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    </x-app-layout>