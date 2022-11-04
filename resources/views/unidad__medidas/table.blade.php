<div class="table-responsive">
    <table class="table" id="unidadMedidas-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Símbolo</th>
        <th>Equivalencia</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unidadMedidas as $unidadMedida)
            <tr>
                <td>{{ $unidadMedida->nombre }}</td>
            <td>{{ $unidadMedida->simbolo }}</td>
            <td>{{ $unidadMedida->equivalencia }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['unidadMedidas.destroy', $unidadMedida->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('unidadMedidas.show', [$unidadMedida->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('unidadMedidas.edit', [$unidadMedida->id]) }}"
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
