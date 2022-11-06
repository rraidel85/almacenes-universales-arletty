<!-- Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $oferta->fecha }}</p>
</div>

<!-- Facturado Field -->
<div class="col-sm-12">
    {!! Form::label('stocks', 'Stocks de productos:') !!}
    @foreach($oferta->stock_producto as $stock)
        <p>-{{ $stock->cantidad.' '.$stock->producto->nombre }}</p>
    @endforeach
</div>


