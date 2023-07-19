<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container-error-dashboard">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Hola!!. Bienvenido al sistema UNIKA.") }}

                    <!-- generar un dashboar con informacion de la empresa tomando datos de las tablas de la base de datos -->

                    <!--  CANTIDAD DE USUSARIO REGISTRADOS, LOS NOMBRE DE MODULOS, EL USUSARIO INGRESADO, UN FDIAGRAMA DE BARRAS, ETC-->

                    <!-- cantidad de ususairos registrados, no me des auditoria -->

                   




                </div>
            </div>
        </div>
</x-app-layout>