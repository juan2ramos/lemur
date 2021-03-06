@extends ('layouts.admin')


@section ('title') Categorias @stop
@section ('contend')
<h1>Idea</h1>

{{ Form::open(array('url' => 'admin/ideas/updateAdmin' )) }}
{{Form::hidden('id',$idea['id'])}}


<div class="row">
    <div class="form-group">
        {{ Form::label('', 'Ingresada') }}
        <span>{{$idea['created_at']}}</span>
    </div>
    <div class="form-group">
        {{ Form::label('', 'Usuario') }}
        <span>{{$user['nombre']. ' ' .$user['apellidos']}}</span>
    </div>
    <div class="form-group">
        {{ Form::label('numero_votos', 'Numero de votos') }}
        {{ Form::text('numero_votos', $idea['numero_votos']) }}
    </div>
    <div class="form-group">
        {{ Form::label('estado_publicacion', 'Estado') }}
        {{Form::select('estado_publicacion', $comboBoxPublicacion, $idea['estado_publicacion'])}}
    </div>
    <div class="form-group">
        {{ Form::label('titulo', 'Titulo') }}
        {{ Form::text('titulo', $idea['titulo']) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_categorias', 'Categorias') }}
        {{Form::select('id_categorias', $comboBox, $idea['id_categorias'])}}
    </div>
    <div class="form-group">
        {{ Form::label('url_video', 'Video') }}
        {{ Form::text('url_video', $idea['url_video']) }}
    </div>
    <div class="form-group">
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', $idea['descripcion']) }}
    </div>

</div>
<div class="row">
    <div class="form-group">
        {{ Form::label('problematica', 'Problematica') }}
        {{ Form::textarea('problematica', $idea['problematica']) }}
    </div>
    <div class="form-group">
        {{ Form::label('solucion', 'Solución') }}
        {{ Form::textarea('solucion', $idea['solucion']) }}
    </div>
</div>


{{ Form::button('Actualizar idea', array('type' => 'submit', 'class' => 'btn-admin')) }}

{{Form::close()}}
<ul class="images">
    @foreach($images as $image)

    <li>
        {{HTML::image('/upload/'.$image['url'],'')}}
    </li>
    @endforeach
</ul>

@if(!is_null($votos))
<h2>Votos</h2>

<table class=" table-primary ">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>apellidos</th>
        <th>email</th>

    </tr>
    <thead>
    <tbody>
    @foreach ($votos as $voto)
    <tr>
        <td>{{ $voto['nombre'] }}</td>
        <td>{{ $voto['apellidos'] }}</td>
        <td>{{ $voto['email'] }}</td>
    </tr>

    @endforeach
    </tbody>
</table>
@endif
<h2>Comentarios</h2>
<table class=" table-primary ">
    <thead>
    <tr>
        <th>Comentario</th>
        <th>Usuario</th>
        <th>Fecha</th>
        <th>estado</th>
    </tr>
    <thead>
    <tbody>
    @foreach ($comentarios as $comentario)
    <tr>
        <td>{{ $comentario['pivot']['comentario']}}</td>
        <td>{{ $comentario['nombre']. ' ' .$comentario['apellido'] }}</td>
        <td>{{ $comentario['pivot']['created_at']}}</td>
        <?php
        $id = $comentario['pivot']['id'];
        $check = ($comentario['pivot']['estado'] == 1)?'checked':'';
        echo($id);
        ?>
        <td class="center">{{Form::checkbox('estado', 'value', $check ,['class' => 'check','data-id' => $id ])}}</td>
    </tr>
    {{HTML::link('admin/comentario/update','',['id' => 'comntarioUpdate'])}}
    @endforeach
    </tbody>
</table>

@stop
@section('javascript')
<?php echo HTML::script('js/ideasAdmin.js') ?>
@stop