    <table class="table table-striped mt-2 table-bordered" id="almacens-table">
        <thead>
        
            <th>Nombre</th>
            <th class="notexport">Opciones</th>
        
        </thead>
        <tbody>
        @foreach($almacens as $almacen)
            <tr>
                <td>{{ $almacen->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['almacens.destroy', $almacen->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('almacens.show', [$almacen->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('almacens.edit', [$almacen->id]) }}"
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

