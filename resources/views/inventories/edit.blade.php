<x-app-layout>
<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">
            <h2>Actualizar Máquina</h2>
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

            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="text-center mb-3">
                    <label for="name">Información de Máquina</label>
                </div>
                <div>
                    <label for="name">Complete los datos</label>
                </div>
                <!-- * @property string $machine
 * @property string $detail
 * @property integer $quantity
 * @property number $unit_price
 * @property number $total_price
 * @property string $state -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="machine">Máquina:</label>
                            <input type="text" class="form-control" id="machine" name="machine" value="{{ $inventory->machine }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="detail">Detalle:</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ $inventory->detail }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="quantity">Cantidad:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $inventory->quantity }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="unit_price">Precio Unitario:</label>
                            <input type="number" class="form-control" id="unit_price" name="unit_price" value="{{ $inventory->unit_price }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="total_price">Precio Total:</label>
                            <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $inventory->total_price }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="state">Estado:</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{ $inventory->state }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/inventories/create.js') }}"></script>

</x-app-layout>