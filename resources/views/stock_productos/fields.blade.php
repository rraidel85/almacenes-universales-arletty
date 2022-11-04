<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Compra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_compra', 'Precio Compra:') !!}
    {!! Form::number('precio_compra', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Entrada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_entrada', 'Fecha Entrada:') !!}
    {!! Form::text('fecha_entrada', null, ['class' => 'form-control','id'=>'fecha_entrada']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_entrada').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Feha Produccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('feha_produccion', 'Feha Produccion:') !!}
    {!! Form::text('feha_produccion', null, ['class' => 'form-control','id'=>'feha_produccion']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#feha_produccion').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Fecha Vencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_vencimiento', 'Fecha Vencimiento:') !!}
    {!! Form::text('fecha_vencimiento', null, ['class' => 'form-control','id'=>'fecha_vencimiento']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_vencimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto:') !!}
    {!! Form::select('producto_id', $productos, null, ['class' => 'form-control custom-select' ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('recepcin_ciega_id', 'RecepcionCiega:') !!}
    {!! Form::select('recepcin_ciega_id', $recepcin_ciega, null, ['class' => 'form-control custom-select' ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('areas_id', 'Area:') !!}
    {!! Form::select('areas_id', $area, null, ['class' => 'form-control custom-select' ]) !!}
</div>