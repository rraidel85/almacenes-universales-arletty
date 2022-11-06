<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<div class="form-group col-sm-6">
    {!! Form::label('stock_productos', 'Stock de productos:') !!}
    <div class="select2-blue">
        <select name="stocks[]" class="select2 form-control" id="stockSelect" multiple="multiple" style="width: 100%;">
            @foreach ($stocks as $stock)
                <option value={{ $stock->id }}>{{ $stock->producto->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>   

@push('page_scripts')
    <script type="text/javascript">
        $('.select2').select2({
            allowClear: true,
            placeholder: 'Selecciona los productos',
        });
    </script>
@endpush