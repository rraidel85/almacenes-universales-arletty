<div class="table-responsive">
    <table class="table" id="stockProductos-table">
        <thead>
        <tr>
            <th>Número Factura</th>
            <th>Producto</th>
            <th>Cantidad</th>
        <th>Precio Compra</th>
        <th>Fecha Entrada</th>
        <th>Feha Producción</th>
        <th>Fecha Vencimiento</th>
        <th>Área</th>

            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stockProductos as $stockProducto)
            <tr>
                <td>{{ $stockProducto->cantidad }}</td>
            <td>{{ $stockProducto->precio_compra }}</td>
            <td>{{ $stockProducto->fecha_entrada }}</td>
            <td>{{ $stockProducto->feha_produccion }}</td>
            <td>{{ $stockProducto->fecha_vencimiento }}</td>
            <td>{{ $stockProducto->producto->nombre }}</td>
            <td>{{ $stockProducto->recepcion_ciega->numerofactura }}</td>
            <td>{{ $stockProducto->areas->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['stockProductos.destroy', $stockProducto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('stockProductos.show', [$stockProducto->id]) }}"
                            class='btn btn-light bg-green'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('stockProductos.edit', [$stockProducto->id]) }}"
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
