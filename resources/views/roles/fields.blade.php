<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Costo Por Unidad Field -->
@if (isset($rolePermission))
    <div class="form-group col-sm-12">
        {!! Form::label('Permisos', 'Permisos:') !!}
        <div class="row">
            @foreach($permissions as $permission)
                <div class="col-xs-12 col-sm-3 col-md-3 mb-3">
                    <label>
                        <input {{ in_array($permission->id, $rolePermission) ? 'checked' : '' }} type="checkbox" name="permissions[]" class="form-check-inline"
                               value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="form-group col-sm-12">
        {!! Form::label('Permisos', 'Permisos:') !!}
        <div class="row">
            @foreach($permissions as $permission)
                <div class="col-xs-12 col-sm-3 col-md-3 mb-3">
                    <label>
                        <input type="checkbox" name="permissions[]" class="form-check-inline"
                               value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@endif

