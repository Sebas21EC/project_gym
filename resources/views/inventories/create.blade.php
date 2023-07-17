<x-app-layout>
<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">
            <h2>Crear Máquina</h2>
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

        <form action="{{ route('inventories.store') }}" method="POST" class="form">
            @csrf
            <div class="text-center mb-3">
                <label for="name">Información de la Máquina</label>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="name">Complete los datos</label>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="machine">Máquina:</label>
                        <input type="text" class="form-control" id="machine" name="machine" placeholder="Ingresar la máquina" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="detail">Detalle:</label>
                        <input type="text" class="form-control" id="detail" name="detail" placeholder="Ingresar el detalle" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="quantity">Cantidad:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Ingresar la cantidad" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="unit_price">Precio Unitario:</label>
                        <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Ingresar el precio unitario" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="total_price">Precio Total:</label>
                        <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Ingresar el precio total" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Ingresar el estado" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success">Crear</button>
        </form>
    </div>
<script src="{{ asset('js/inventories/create.js') }}"></script>
</x-app-layout>
