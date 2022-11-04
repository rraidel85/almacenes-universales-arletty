    <table class="table table-striped mt-2 table-bordered" id="areas-table">
        <thead>
        
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Almacén</th>
            

            <th class="notexport">Opciones</th>
 
        </thead>
        <tbody>
        @foreach($areas as $area)
            <tr>
                <td>{{ $area->nombre }}</td>
                <td>{{ $area->descripcion }}</td>
                <td>{{ $area->almacenes->nombre }}</td>
                
                
                <td width="120">
                    {!! Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('areas.show', [$area->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('areas.edit', [$area->id]) }}"
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

