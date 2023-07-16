<x-app-layout>
    <div class="container" style="margin-top: 3rem;">
        <div class="card">
            <div class="card-header">
                <h2>Actualizar Membresía</h2>
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

                <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
                    @method('PUT')
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
                                <label for="partner_id">Cédula de la clienta:</label>
                                <input type="text" class="form-control" id="partner_id" name="partner_id" value="{{ $subscription->partner_id }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="subscription_type_id">Tipo de membresía:</label>
                                <select name="subscription_type_id" id="subscription_type_id" class="form-control" required>
                                    @foreach ($subscriptionTypes as $id => $name)
                                        <option value="{{ $id }}" data-n-months="{{ $nMonths[$id] }}" {{ $subscription->subscription_type_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="start_date">Fecha de inicio:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $subscription->start_date }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="end_date">Fecha de fin:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $subscription->end_date }}" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/subscriptions/create.js') }}"></script>
</x-app-layout>
