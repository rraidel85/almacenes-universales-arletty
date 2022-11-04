<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $recepcionCiega->id }}</p>
</div>

<!-- Factura Field -->
<div class="col-sm-12">
    {!! Form::label('numerofactura', 'NumeroFactura:') !!}
    <p>{{ $recepcionCiega->numerofactura }}</p>
</div>

<!-- Transportador Field -->
<div class="col-sm-12">
    {!! Form::label('nombretransportador', 'NombreTransportador:') !!}
    <p>{{ $recepcionCiega->nombretransportador }}</p>
</div>
<!-- Transportador Field -->
<div class="col-sm-12">
    {!! Form::label('matriculacamion', 'MatriculaCamion:') !!}
    <p>{{ $recepcionCiega->matriculacamion }}</p>
</div>



<!-- Proveedor Field -->
<div class="col-sm-12">
    {!! Form::label('proveedor_id', 'Proveedor:') !!}
    <p>{{ $recepcionCiega->proveedor->nombre}}</p>
</div>


