<x-app-layout>
<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">
            <h2>Crear Clienta</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        <form action="{{ route('partners.store') }}" method="POST" class="form">
            @csrf
            <div class="text-center mb-3">
                <label for="name">Información Básica</label>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="name">Complete los datos de su clienta</label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="id">Identificación:</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingresar identificación del cliente" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar el nombre del cliente" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Ingresar la dirección" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="birth_date">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="occupation">Ocupación:</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Ingresar la ocupación" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar el correo electrónico" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="type">Tipo:</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Ingresar el tipo" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingresar el número de teléfono" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Crear</button>
        </form>
    </div>
</x-app-layout>
