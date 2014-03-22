@extends('layouts.layout')

@section('contend')

<section id='contend'>
    <div class="password">
        <h2>¿Olvidaste tu contraseña?</h2>

        <p> Ingresa tu dirección de correo electrónico y te enviaremos instrucciones
            para generar una nueva contraseña.
        </p>

        {{ Form::open(array('url' => 'password/new',  'id'=>'form-password')) }}
            <label>Correo electrónico<span>*</span></label>
            {{Form::text('email')}}
            <input type="submit">
        {{ Form::close() }}
    </div>

</section>
@stop