<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $role->id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $role->updated_at }}</p>
</div>


<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $role->name }}</p>
</div>



<div class="form-group col-sm-12">
    {!! Form::label('Permisos', 'Permisos:') !!}
    <div class="row">
        <ol>
        @foreach($rolePermissions as $permission)
            <li>{{ $permission->name }}</li>
        @endforeach
        </ol>
    </div>
</div>

