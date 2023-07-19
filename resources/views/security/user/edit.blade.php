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
                <h1>Actualizar Usuario</h1>
                <a class="btn btn-success" href="{{ route('user.index') }}">Volver</a>
            </div>
        </div>

        <form action="{{ route('user.update', [$user->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="name">Usuario</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre"
                value="{{ $user->name }}">

       
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                value="{{ $user->email }}">

            
            <label for="is_active">Activado</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>SI</option>
                <option value="0" {{ $user->is_active == 0 ? 'selected' : '' }}>NO</option>
            </select>


            <label for="available_roles">Roles Disponibles</label>
            <select name="available_roles[]" id="available_roles" multiple class="form-control">
                @foreach ($available_roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>

            <div class="col-md-2 d-flex align-items-center">
                <div class="text-center">
                    <button type="button" id="add_role" class="btn btn-primary">&gt;</button>
                    <br><br>
                    <button type="button" id="remove_role" class="btn btn-primary">&lt;</button>
                </div>
            </div>

            <label for="selected_roles">Roles Asignados</label>
            <select name="selected_roles[]" id="selected_roles" multiple class="form-control" readonly>
                @foreach ($user->roles as $role)
                    <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                @endforeach
            </select>




            <input type="submit" class="btn btn-primary" value="Guardar" />


        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
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