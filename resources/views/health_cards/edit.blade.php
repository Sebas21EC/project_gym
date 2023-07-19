<x-app-layout>
<div class="container" style="margin-top: 3rem;">
    <div class="card">
        <div class="card-header">
            <h2>Actualizar Ficha de Salud</h2>
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

            <form action="{{ route('healthCards.update', $healthCard->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="text-center mb-3">
                    <label for="name">Información de la clienta</label>
                </div>
                <div>
                    <label for="name">Complete los datos</label>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="partner_id">Cédula:</label>
                            <input type="text" class="form-control" id="partner_id" name="partner_id" value="{{ $healthCard->partner_id }}" placeholder="Ingresar la cédula" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="activity_level">Nivel de actividad física:</label>
                            <input type="number" class="form-control" id="activity_level" name="activity_level" value="{{ $healthCard->activity_level }}" placeholder="Ingresar el nivel de actividad física" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="feeding_frequency">Frecuencia de alimentación:</label>
                            <input type="number" class="form-control" id="feeding_frequency" name="feeding_frequency" value="{{ $healthCard->feeding_frequency }}" placeholder="Ingresar la frecuencia de alimentación" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="intolerances">Intolerancias:</label>
                            <input type="text" class="form-control" id="intolerances" name="intolerances" value="{{ $healthCard->intolerances }}" placeholder="Ingresar las intolerancias" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="allergies">Alergias:</label>
                            <input type="text" class="form-control" id="allergies" name="allergies" value="{{ $healthCard->allergies }}" placeholder="Ingresar las alergias" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="food_preparation">Preparación de alimentos:</label>
                            <input type="text" class="form-control" id="food_preparation" name="food_preparation" value="{{ $healthCard->food_preparation }}" placeholder="Ingresar la preparación de alimentos" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pathology">Patología:</label>
                            <input type="text" class="form-control" id="pathology" name="pathology" value="{{ $healthCard->pathology }}" placeholder="Ingresar la patología" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="family_pathology">Patología familiar:</label>
                            <input type="text" class="form-control" id="family_pathology" name="family_pathology" value="{{ $healthCard->family_pathology }}" placeholder="Ingresar la patología familiar" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="medication">Medicación:</label>
                            <input type="text" class="form-control" id="medication" name="medication" value="{{ $healthCard->medication }}" placeholder="Ingresar la medicación" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/healthCards/create.js') }}"></script>

</x-app-layout>