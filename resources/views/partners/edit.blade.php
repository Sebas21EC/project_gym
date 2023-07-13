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

            <form action="{{ route('partners.update', $partner->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="text-center mb-3">
                    <label for="name">Información Básica</label>
                </div>
                <div>
                    <label for="name">Complete los datos de su clienta</label>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $partner->name }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone">Teléfono:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $partner->phone }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $partner->address }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="birth_date">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $partner->birth_date }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="occupation">Ocupación:</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $partner->occupation }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $partner->email }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="type">Tipo:</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $partner->type }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
</x-app-layout>