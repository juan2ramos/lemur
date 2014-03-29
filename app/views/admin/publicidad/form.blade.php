@extends ('layouts.admin')


@section ('title') Categorias @stop
@section ('contend')
<h1>Pop Up Inicio</h1>

{{ Form::open(array('url' => 'admin/publicidad','files' => true )) }}
{{Form::hidden('id',$publicidad['id'])}}
<div class="row">
    <div class="form-group">
        {{ Form::label('titulo', 'Titulo') }}
        {{ Form::text('titulo', $publicidad["titulo"] ) }}
    </div>
    <div class="form-group">
        {{ Form::label('texto', 'Texto') }}
        {{ Form::textarea('texto', $publicidad['texto']) }}
    </div>
    <div class="form-group">
        {{ Form::label('imagen', 'Imagen') }}
        {{ Form::file('imagen') }}
    </div>
    <div class="form-group">
        {{ Form::label('estado', 'Estado') }}
        {{Form::select('estado', $comboBox, $publicidad['estado'])}}
    </div>
    <div class="form-group">
        {{ Form::label('link', 'Link') }}
        {{ Form::text('link', $publicidad["link"] ) }}
    </div>
    {{ Form::button('Actualizar Publicidad', array('type' => 'submit', 'class' => 'btn-admin')) }}


</div>


{{Form::close()}}

@stop
@section('javascript')
<?php echo HTML::script('js/script.js') ?>
@stop