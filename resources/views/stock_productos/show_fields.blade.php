<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $stockProducto->cantidad }}</p>
</div>

<!-- Precio Compra Field -->
<div class="col-sm-12">
    {!! Form::label('precio_compra', 'Precio Compra:') !!}
    <p>{{ $stockProducto->precio_compra }}</p>
</div>

<!-- Fecha Entrada Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_entrada', 'Fecha Entrada:') !!}
    <p>{{ $stockProducto->fecha_entrada }}</p>
</div>

<!-- Feha Produccion Field -->
<div class="col-sm-12">
    {!! Form::label('feha_produccion', 'Feha Produccion:') !!}
    <p>{{ $stockProducto->feha_produccion }}</p>
</div>

<!-- Fecha Vencimiento Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_vencimiento', 'Fecha Vencimiento:') !!}
    <p>{{ $stockProducto->fecha_vencimiento }}</p>
</div>

<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $stockProducto->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $stockProducto->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $stockProducto->updated_at }}</p>
</div>


<!-- Producto Field -->
<div class="col-sm-12">
    {!! Form::label('producto_id', 'Producto:') !!}
    <p>{{ $stockProducto->producto->nombre }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('recepcion_ciega_id', 'RecepcionCiega:') !!}
    <p>{{ $stockProducto->recepcin_ciega->numerofactura }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('area_id', 'Area:') !!}
    <p>{{ $stockProducto->area->nombre }}</p>
</div>

