<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $user->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $user->updated_at }}</p>
</div>

<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $user->nombre }}</p>
</div>

<!-- Descripción Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Correo:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Cantidad Maxima Field -->
<div class="col-sm-12">
    {!! Form::label('rol', 'Rol:') !!}
    @if (!empty($user->getRoleNames()))
        @foreach ($user->getRoleNames() as $rolName)
            <h5><span class="badge">{{ $rolName }}</span></h5>
        @endforeach
    @else
        <p>----</p>
    @endif
</div>


