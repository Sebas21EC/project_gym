<x-app-layout>

    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1>Crear Usuario</h1>
                <a class="btn btn-primary" href="{{ route('user.index') }}">Volver</a>
            </div>
        </div>

        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            @method('POST')
            <label for="name">Usuario</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">

            <label for="password">Contrase&#241;a</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contrasena" value="{{ old('password') }}">
            <label for="is_active">Estado</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <label for="available_employees">Empleados Disponibles</label>
            <select name="employee_id" id="available_employees" class="form-control">
                @foreach ($available_employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->first_name }}</option>
                @endforeach
            </select>


            <label for="available_roles">Roles Disponibles</label>
            <select name="available_roles[]" id="available_roles" multiple class="form-control">
                @foreach ($available_roles as $role)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>

            <br>    
            <div class="col-md-2 d-flex align-items-center">
                <div class="text-center">
                    <button type="button" id="add_role" class="btn btn-outline-success">&gt;</button>
                    <br><br>
                    <button type="button" id="remove_role" class="btn btn-outline-success">&lt;</button>
                </div>
            </div>
            <br>
            <label for="available_roles">Roles Asignados</label>
            <select name="selected_roles[]" id="selected_roles" multiple class="form-control">

            </select>

            <br>

            <input type="submit" class="btn btn-outline-success" value="Guardar" />


        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addButton = document.getElementById('add_role');
            var removeButton = document.getElementById('remove_role');
            var availableItemsList = document.getElementById('available_roles');
            var selectedItemsList = document.getElementById('selected_roles');

            addButton.addEventListener('click', function() {
                moveSelectedItems(availableItemsList, selectedItemsList);
            });

            removeButton.addEventListener('click', function() {
                moveSelectedItems(selectedItemsList, availableItemsList);
            });

            function moveSelectedItems(sourceList, destinationList) {
                var selectedOptions = Array.from(sourceList.selectedOptions);

                selectedOptions.forEach(function(option) {
                    destinationList.appendChild(option);
                });
            }
        });
    </script>
</x-app-layout>