<!-- Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha Oferta:') !!}
    <p>{{ $factura->oferta->fecha }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('stocks', 'Stocks de productos:') !!}
    @foreach($factura->oferta->stock_producto as $stock)
        <p>-{{ $stock->cantidad.' '.$stock->producto->nombre }}</p>
    @endforeach
</div>

<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha Factura:') !!}
    <p>{{ $factura->fecha }}</p>
</div>



