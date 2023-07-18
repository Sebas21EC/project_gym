<x-app-layout>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Estadisticas</h1>
                <br>
                <h2>Escala de Likert</h2>
                <table class="table table-hover table-hover " style="text-align: center" >
                    <thead>
                        <tr>
                            <!-- color desde azul a rojo,  -->
                            <th style="background-color: #1E90FF; color: white">20%</th>
                            <!-- color amarillo -->
                            <th style="background-color: #FFFF00">40%</th>
                            <!-- color verde -->
                            <th style="background-color: #00FF00">60%</th>
                            <!-- color naranja -->
                            <th style="background-color: #FFA500">80%</th>
                            <!-- color rojo -->
                            <th style="background-color: #FF0000; color: white">100%</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- el mismo de arriba pero mas transparente -->
                            <td style="background-color: #1E90FF; color: black; opacity: 0.4">Muy Inactivo</td>
                            <td style="background-color: #FFFF00; opacity: 0.5">Inactivo</td>
                            <td style="background-color: #00FF00; opacity: 0.5">Moderado</td>
                            <td style="background-color: #FFA500; opacity: 0.5">Activo</td>
                            <td style="background-color: #FF0000; color: black; opacity: 0.5">Muy Activo</td>
                            
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="table table-bordered table-hover display" id="table_id">
                    <thead class="thead-dark">
                        <tr>
                            <th>Identificaci&oacute;n Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Cantidad de acciones</th>
                            <th>Escala de Likert</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($audits as $audit)
                            <tr>
                                <td>{{ $audit->id }}</td>
                                <td>{{ $audit->name }}
                                </td>
                                <td>{{ $audit->number_actions }}</td>
                                <td style="background-color: {{ $likertColors[$likertLevelsUser[$audit->id]] }}">{{ $likertLevelsUser[$audit->id] }}</td>
                                </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>



</x-app-layout>