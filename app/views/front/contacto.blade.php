@extends('layouts.layout')

@section('contend')
<section id='contend'>
    <div class="contacto">
        <h2>Contáctanos</h2>
        <p>¿Quieres contarnos algo? Este espacio es tuyo, cuéntanos lo que quieras.</p>
        @if ($errors->any())
        <div class="alert-danger">
            <strong>Por favor corrige los siguentes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ Form::open(array('url' => 'envioContacto','class' => 'contact-form')) }}
            <label>Nombre<span>*</span></label>
            <input type="text" name="nombre">
            <label>Correo electrónico<span>*</span></label>
            <input type="text" name="email">
            <label>Mensaje<span>*</span></label>
            <span class="message-span">*Estos campos son obligatorios</span>

            <input class="text" type="text" name="mensaje" >
            <span class="message-span width-span">¡Gracias por escribirnos! Te responderemos cuanto antes</span>

            <input class="sumbit" type="submit" value="Envíanos tu mensaje">
        {{ Form::close() }}
    </div>
</section>
@stop