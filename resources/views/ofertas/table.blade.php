
    <table class="table table-striped mt-2 table-bordered" id="ofertas-table">
        <thead>
        
            <th>Fecha</th>
        <th>Facturado</th>
        <th class="notexport">Opciones</th>
    
        </thead>
        <tbody>
        @foreach($ofertas as $oferta)
            <tr>
                <td>{{ $oferta->fecha }}</td>
            <td>{{ $oferta->facturado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ofertas.destroy', $oferta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ofertas.show', [$oferta->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ofertas.edit', [$oferta->id]) }}"
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

