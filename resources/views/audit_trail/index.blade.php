<x-app-layout>

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Auditor&iacute;a</h1>
                <table class="table table-hover display" id="table_id">
                    <thead>
                        <tr>
                            <th>Identificaci&oacute;n Usuario</th>
                            <th>Usuario</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Informaci&oacute;n </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($audits as $audit)
                            <tr>
                                <td>{{ $audit->user ? $audit->user->user_id : '-' }}</td>
                                <td>{{ $audit->user ? $audit->user->name : '-' }}
                                    <!-- {{ $audit->user ? $audit->user->name : '-' }} -->
                                </td>
                                <td>{{ $audit->event }}</td>
                                <td>
                                    <input type="datetime" readonly value="{{ $audit->created_at }}">
                                </td>
                                <td>{{ $audit->old_values || $audit->new_values ? $audit->old_values . ' - ' . $audit->new_values : '-' }}</td>                                

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</x-app-layout>