<div class="card">
    <div class="card-header">
        <p class="text-black px-2 py-2 m-0"> {{ $cliente->nombrecompañia }}</p>
    </div>
    <div class="card-body">
        <!-- Id Field -->
        <div class="col-sm-12">
            {!! Form::label('id', 'Id:') !!}
            <p class="d-inline">{{ $cliente->id }}</p>
        </div>

        <!-- Direccion Field -->
        <div class="col-sm-12">
            {!! Form::label('direccion', 'Direccion:') !!}
            <p class="d-inline">{{ $cliente->direccion }}</p>
        </div>

        <!-- Telefono Field -->
        <div class="col-sm-12">
            {!! Form::label('telefono', 'Telefono:') !!}
            <p class="d-inline">{{ $cliente->telefono }}</p>
        </div>

        <!-- Telefono Field -->
        <div class="col-sm-12">
            {!! Form::label('identificador', 'Identificador:') !!}
            <p class="d-inline">{{ $cliente->identificador }}</p>
        </div>

    </div>
</div>
