
    <table class="table table-striped mt-2 table-bordered" id="facturas-table">
        <thead>
       
            <th>Fecha</th>
            <th class="notexport">Opciones</th>
      
        </thead>
        <tbody>
        @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->fecha }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['facturas.destroy', $factura->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('facturas.show', [$factura->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('facturas.edit', [$factura->id]) }}"
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

