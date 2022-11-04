<!-- Factura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numerofactura', 'NumeroFactura:') !!}
    {!! Form::text('numerofactura', null, ['class' => 'form-control']) !!}
</div>

<!-- Transportador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombretransportador', 'NombreTransportador:') !!}
    {!! Form::text('nombretransportador', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('matriculacamion', 'MatriculaCamion:') !!}
    {!! Form::text('matriculacamion', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('proveedor_id', 'Proveedor:') !!}
    {!! Form::select('proveedor_id', $proveedores, null, ['class' => 'form-control custom-select' ]) !!}
</div>