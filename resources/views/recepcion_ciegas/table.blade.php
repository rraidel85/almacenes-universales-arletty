<div class="table-responsive">
    <table class="table" id="recepcionCiegas-table">
        <thead>
        <tr>
            <th>Número Factura</th>
        <th>Nombre Transportador</th>
        <th>Matrícula Camión</th>
        <th>Proveedor</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recepcionCiegas as $recepcionCiega)
            <tr>
                <td>{{ $recepcionCiega->numerofactura }}</td>
            <td>{{ $recepcionCiega->nombretransportador }}</td>
            <td>{{ $recepcionCiega->matriculacamion }}</td>
            <td>{{ $recepcionCiega->proveedor->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['recepcionCiegas.destroy', $recepcionCiega->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('recepcionCiegas.show', [$recepcionCiega->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('recepcionCiegas.edit', [$recepcionCiega->id]) }}"
                            class='btn btn-light bg-blue'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-light bg-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
