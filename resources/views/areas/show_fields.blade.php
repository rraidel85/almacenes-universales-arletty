<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $area->id }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $area->nombre }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{{ $area->descripcion }}</p>
</div>



<div class="col-sm-12">
    {!! Form::label('almacenes_id', 'Almacen:') !!}
    <p>{{ $area->almacenes->nombre }}</p>
</div>

