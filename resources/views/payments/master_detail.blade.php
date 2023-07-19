<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de Pago') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Detalles del Pago</h2>
                        <hr>
                        <p>ID del Pago: {{ $payment->id }}</p>
                        <p>Monto: {{ $payment->amount }}</p>
                        <p>Método de pago: {{ $payment->payment_method }}</p>
                        <p>Detalle: {{ $payment->description }}</p>
                        <h3>Fecha</h3>
                        <p>Fecha de Pago: {{ $payment->created_at }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Detalles de la Suscripción</h2>
                        <hr>
                        <p>Id Membresía: {{ $payment->subscription->id }}</p>
                        <p>Tipo de Membresía: {{ $payment->subscription->subscriptionType->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Detalles del Cliente</h2>
                        <hr>
                        <p>Nombre: {{ $payment->subscription->partner->name }}</p>
                        <p>Cédula: {{ $payment->subscription->partner->id }}</p>
                        <p>Teléfono: {{ $payment->subscription->partner->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
