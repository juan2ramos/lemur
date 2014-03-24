@extends ('layouts.admin')


@section ('title') Usuarios @stop
@section ('contend')
<h1>Categorias</h1>
{{HTML::link('admin/users/ingresar/'.$user['id'],'Ingresar como '.$user['nombre'],['class' => 'btn-admin'])}}

<br/>
<br/>
<br/>
<br/>

<div class="row">
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        <input type="text" value="{{$user['nombre']}}">
    </div>


    <div class="form-group">
        {{ Form::label('apellidos', 'Fecha inicio') }}
        <input type="text" value="{{$user['apellidos']}}">
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        <input type="text" value="{{$user['email']}}">
    </div>
    <div class="form-group">
        {{ Form::label('edad', 'Edad') }}
        <input type="text" value="{{$user['edad']}}">
    </div>
    <div class="form-group">
        {{ Form::label('genero', 'Genero') }}
        <input type="text" value="{{$user['genero']}}">
    </div>
    <div class="form-group">
        {{ Form::label('profesion', 'Profesión') }}
        <input type="text" value="{{$user['profesion']}}">
    </div>

    <div class="form-group">
        {{ Form::label('nivel_estudios', 'Nivel estudios') }}
        <input type="text" value="{{$user['nivel_estudios']}}">
    </div>
</div>
<div class="row">
    <div class="form-group">
        {{ Form::label('intereses', 'Intereses') }}
        <input type="text" value="{{$user['intereses']}}">
    </div>
    <div class="form-group">
        {{ Form::label('estado_civil', 'Estado civil') }}
        <input type="text" ="{{$user['estado_civil']}}">
    </div>
    <div class="form-group">
        {{ Form::label('pais', 'Paísinicio') }}
        <input type="text" value="{{$user['pais']}}">
    </div>
    <div class="form-group">
        {{ Form::label('ciudad', 'Ciudad') }}
        <input value="{{$user['ciudad']}}">
    </div>
    <div class="form-group">
        {{ Form::label('sobre_ti', 'Sobre ti') }}
        <textarea>{{$user['sobre_ti']}}</textarea>
    </div>
    <div class="form-group">
        {{ Form::label('h', 'Habilidades') }}
        <textarea>{{$user['habilidades']}}</textarea>
    </div>

</div>

{{ Form::open(array('url' => 'admin/users/changeRole', )) }}

<div class="form-group">
    {{Form::label('role', 'Permisos') }}
    {{Form::select('role', $comboBox, $user['role'])}}
    {{Form::hidden('id',$user['id'])}}
    {{Form::submit('Cambiar permisos',['class' => 'btn-admin'])}}
</div>
{{Form::close()}}
@stop
@section('javascript')
<?php echo HTML::script('js/script.js') ?>
@stop