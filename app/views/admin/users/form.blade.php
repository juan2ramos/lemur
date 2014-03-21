@extends ('layouts.admin')


@section ('title') {{ $action }} Usuarios @stop
@section ('content')
@if ($action == 'Editar')  
{{ Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar usuario', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif
<h1>Crear Usuarios</h1>
@include ('admin/errors', array('errors' => $errors))
{{ Form::model($user, $form_data, array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('full_name', 'Nombre completo') }}
      {{ Form::text('full_name', null, array('placeholder' => 'Introduce tu nombre y apellido', 'class' => 'form-control')) }}        
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button('Crear usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@stop
@section('javascript')
	<?php echo HTML::script('js/script.js') ?>
@stop