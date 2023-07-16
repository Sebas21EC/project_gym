<x-app-layout>
    <div class="container" style="margin-top: 2rem; padding-bottom: 6rem;">
            
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @error('color')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('subscriptions.index') }}" method="GET">
                            <button type="submit" class="btn btn-outline-primary">Volver</button>
                    </form>
                    <div class="container">
                        @include('payments.table')
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
