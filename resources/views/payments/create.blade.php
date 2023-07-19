<x-app-layout>
    <div class="container" style="margin-top: 3rem;">
        <div class="card">
            <div class="card-header">
                <h2>Registrar Pago</h2>
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
                <form action="{{ route('payments.store') }}" method="POST" class="form">
                    @csrf
                    <div class="text-center mb-3">
                        <label for="name">Información del pago</label>
                    </div>
                    <div style="margin-bottom: 1rem;">
                        <label for="name">Complete los datos del pago</label>
                    </div>

                    <input type="hidden" name="subscription_id" value="{{ $subscriptionId }}">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date_payment">Fecha de pago:</label>
                                <input type="date" name="date_payment" id="date_payment" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="description">Descripción:</label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="amount">Monto:</label>
                                <input type="number" name="amount" id="amount" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="payment_method">Método de pago:</label>
                                <select name="payment_method" id="payment_method" class="form-control" required>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                                    <option value="Tarjeta de débito">Tarjeta de débito</option>
                                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Crear</button>
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/payments/create.js') }}"></script>
</x-app-layout>
