@extends ('layouts.admin')


@section ('title') Usuarios @stop
@section ('contend')
<h1>Categorias</h1>
@include ('admin/errors', array('errors' => $errors))

{{ Form::open(array('url' => 'admin/categoria/store', )) }}

<div class="row">
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre', Input::old('nombre') ) }}
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado') }}
        {{Form::select('estado', $comboBox, Input::old('estado'))}}
    </div>
</div>
<div class="row">
    <div class="form-group">
        {{ Form::label('fecha_inicio', 'Fecha inicio') }}
        <input name="fecha_inicio" type="date" value="{{Input::old('fecha_inicio')}}"/>
    </div>
    <div class="form-group">
        {{ Form::label('fecha_cierre', 'Fecha cierre') }}
        <input name="fecha_cierre" type="date" value="{{Input::old('fecha_cierre')}}"/>
    </div>
</div>
{{ Form::button('Crear Categoría', array('type' => 'submit', 'class' => 'btn-admin')) }}

{{Form::close()}}

@stop
@section('javascript')
<?php echo HTML::script('js/script.js') ?>
@stop