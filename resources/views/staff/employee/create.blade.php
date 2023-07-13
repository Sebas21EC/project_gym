<x-app-layout>
    <div class="container">
        <h2>Crear empleado</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Identificacion:</label>
                <input type="text" class="form-control" id="identify" name="identify" placeholder="Ingresar la identificacion del empleado" required>
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ingresar los nombres" required>
                <label for="name">Apellido:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingresar los apellidos" required>
                <label for="occupation">Ocupacion:</label>
                <select name="occupation" id="occupation" class="form-control" required>
                    @foreach ($occupations as $occupation)
                    
                    <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                    
                    @endforeach
                </select>
                <label for="name">Telefono:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingresar el numero de telefono" required>
                <label for="name">Direccion:</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Ingresar la direccion" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</x-app-layout>