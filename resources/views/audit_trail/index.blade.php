<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Auditoria') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Auditor&iacute;a</h1>
                                <table class="table table-hover display" id="table_id">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"> Usuario</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Ver más detalles </th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($audits as $audit)
                                        <tr>
                                            <!-- <td scope="row">{{ $audit->user_id ? $audit->user->user_id : '-' }}</td> -->
                                            <td>{{ $audit->user ? $audit->user->name : '-' }}
                                                <!-- {{ $audit->user ? $audit->user->name : '-' }} -->
                                            </td>
                                            </td>
                                            <td>{{ $audit->user ? $audit->user->email : '-' }}</td>
                                            <td>{{ $audit->event }}</td>
                                            <td>
                                                <input type="datetime" readonly value="{{ $audit->created_at }}">
                                            </td>
                                            <!-- <td>{{ $audit->old_values || $audit->new_values ? $audit->old_values . ' - ' . $audit->new_values : '-' }}</td> -->
                                            <td>
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{ $audit->id }}">Ver</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{ $audit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
                                                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- mostar detalles de la tabla audit -->


                                                                <!-- $morphPrefix = config('audit.user.morph_prefix', 'user');

$table->bigIncrements('id');
$table->string($morphPrefix . '_type')->nullable();
$table->unsignedBigInteger($morphPrefix . '_id')->nullable();
$table->string('event');
$table->morphs('auditable');
$table->text('old_values')->nullable();
$table->text('new_values')->nullable();
$table->text('url')->nullable();
$table->ipAddress('ip_address')->nullable();
$table->string('user_agent', 1023)->nullable();
$table->string('tags')->nullable();

$table->timestamps();

$table->index([$morphPrefix . '_id', $morphPrefix . '_type']); -->

                                                                <!-- genera un labe label y un input-->

                                                                <label for="user">Usuario:</label>
                                                                <input type="text" class="form-control" id="user" name="user" value="{{ $audit->user->name }}" required>
                                                                <br>
                                                                <label for="email">Correo:</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ $audit->user->email }}" required>
                                                                <br>
                                                                <label for="event">Tipo:</label>
                                                                <input type="text" class="form-control" id="event" name="event" value="{{ $audit->event }}" required>
                                                                <br>
                                                                <label for="created_at">Fecha:</label>
                                                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $audit->created_at }}" required>
                                                                <br>
                                                                <label for="old_values">Informaci&oacute;n anterior:</label>
                                                                <input type="text" class="form-control" id="old_values" name="old_values" value="{{ $audit->old_values }}" required>
                                                                <br>
                                                                <label for="new_values">Informaci&oacute;n nueva:</label>
                                                                <input type="text" class="form-control" id="new_values" name="new_values" value="{{ $audit->new_values }}" required>
                                                                <br>
                                                                <label for="url">Url:</label>
                                                                <input type="text" class="form-control" id="url" name="url" value="{{ $audit->url }}" required>
                                                                <br>
                                                                <label for="ip_address">Direcci&oacute;n IP:</label>
                                                                <input type="text" class="form-control" id="ip_address" name="ip_address" value="{{ $audit->ip_address }}" required>
                                                                <br>
                                                                <label for="user_agent">Agente de usuario:</label>
                                                                <input type="text" class="form-control" id="user_agent" name="user_agent" value="{{ $audit->user_agent }}" required>
                                                                <br>
                                                                <label for="auditable_type">Tipo de auditor&iacute;a:</label>
                                                                <input type="text" class="form-control" id="auditable_type" name="auditable_type" value="{{ $audit->auditable_type }}" required>
                                                                <br>
                                                                <label for="id">Id:</label>
                                                                <input type="text" class="form-control" id="id" name="id" value="{{ $audit->id }}" required>
                                                                <br>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
</x-app-layout>