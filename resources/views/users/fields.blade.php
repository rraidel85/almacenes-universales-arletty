<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('email', 'Correo:') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>

{{--Roles--}}
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('role', 'Rol:') !!}
    {!! Form::select('role', $roles, null, ['class'=>'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>

<!-- Confirm password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('confirm-password', 'Confirmar contraseña:') !!}
    {!! Form::password('confirm-password',['class'=>'form-control']) !!}
</div>
