<x-app-layout>
<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">
            <h2>Crear Plan de Membresía</h2>
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

        <form action="{{ route('subscriptionTypes.store') }}" method="POST" class="form">
            @csrf
            <div class="text-center mb-3">
                <label for="name">Información del plan de membresía</label>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="name">Complete los datos de membresía</label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar el nombre de la membresía" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="n_months">Duración (Meses):</label>
                        <input type="number" class="form-control" id="n_months" name="n_months" placeholder="Ingresar la duración de la membresía" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Precio:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Ingresar el precio de la membresía" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Crear</button>
            <a href="{{ route('subscriptionTypes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </form>
    </div>
</x-app-layout>
