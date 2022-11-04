<div class="table-responsive">
    <table class="table" id="proveedors-table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Provincia</th>
            <th>Identificador</th>

            
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proveedors as $proveedor)
            <tr>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->provincia }}</td>
                <td>{{ $proveedor->identificador }}</td>
               
                <td width="120">
                    {!! Form::open(['route' => ['proveedors.destroy', $proveedor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proveedors.show', [$proveedor->id]) }}"
                           class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proveedors.edit', [$proveedor->id]) }}"
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
