<x-app-layout>
    <div class="container" style="margin-top: 3rem;">
        <div class="card">
            <div class="card-header">
                <h2>Registrar Membresía</h2>
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

                <form action="{{ route('subscriptions.store') }}" method="POST" class="form">
                    @csrf
                    <div class="text-center mb-3">
                        <label for="name">Información de la membresía</label>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label for="name">Complete los datos de la membresía</label>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="partner_id">Cédula del Cliente:</label>
                                <input type="text" name="partner_id" id="partner_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="subscription_type_id">Tipo de membresía:</label>
                            <select name="subscription_type_id" id="subscription_type_id" class="form-control" required>
                                @foreach ($subscriptionTypes as $id => $name)
                                    <option value="{{ $id }}" data-n-months="{{ $nMonths[$id] }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="start_date">Fecha de inicio:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="end_date">Fecha de fin:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Crear</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/subscriptions/create.js') }}"></script>
</x-app-layout>


