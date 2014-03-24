@extends ('layouts.admin')


@section ('title') Categorias @stop
@section ('contend')
<h1>Categorias</h1>
@include ('admin/errors', array('errors' => $errors))

{{ Form::open(array('url' => 'admin/categoria/update', )) }}
    {{Form::hidden('id',$categoria['id'])}}
  <div class="row">
    <div class="form-group">
      {{ Form::label('nombre', 'Nombre') }}
      {{ Form::text('nombre', $categoria['nombre'], array('placeholder' => '')) }}
    </div>
    <div class="form-group">
      {{ Form::label('estado', 'Estado') }}
        {{Form::select('estado', $comboBox, $categoria['estado'])}}
    </div>
  </div>
  <div class="row">
    <div class="form-group">
      {{ Form::label('fecha_inicio', 'Fecha inicio') }}
        <input name="fecha_inicio" type="date" value="{{$categoria['fecha_inicio']}}"/>
    </div>
      <div class="form-group">
          {{ Form::label('fecha_cierre', 'Fecha cierre') }}
          <input name="fecha_cierre" type="date" value="{{$categoria['fecha_cierre']}}"/>
      </div>
  </div>
  {{ Form::button('Actualizar Categoría', array('type' => 'submit', 'class' => 'btn-admin')) }}

{{Form::close()}}

@stop
@section('javascript')
	<?php echo HTML::script('js/script.js') ?>
@stop