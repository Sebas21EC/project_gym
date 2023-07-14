<x-app-layout>
    <div class="container" style="margin-top: 3rem;">
        <div class="card">
            <div class="card-header">
                <h2>Actualizar Clienta</h2>
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

                <form action="{{ route('subscriptionTypes.update', $subscriptionType->id) }}" method="POST">
                    @method('PUT')
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $subscriptionType->name }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="n_months">Duración (meses):</label>
                                <input type="number" class="form-control" id="n_months" name="n_months" value="{{ $subscriptionType->n_months }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ $subscriptionType->price }}" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
