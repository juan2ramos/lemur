@extends('layouts.layout')

@section('contend')
<section id='contend'>
    <div class="contacto">
        <h2>Contáctanos</h2>
        <p>¿Quieres contarnos algo? Este espacio es tuyo, cuéntanos lo que quieras.</p>

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
@section('javascript')
{{HTML::script('js/updateUser.js')}}
{{HTML::script('js/upload.js')}}
@if ($errors->any())
<script>

    var $popup = $('.popUp-container');
    $popup.addClass('show');
    console.log(data)
    var template = '';
    template +=
        '<div id="contend-error">' +
            '<h2>Error</h2><ul style="color: #ffffff">';

    for (var key in $errors->all()) {
        template += '<li>Campo: ' + key + ' Tipo de error: ' + r[key] +
            '</li>'
    }
    template += '</ul></div>' ;
    $('#popUp-contend').append(template);
    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });
</script>
<div class="alert-danger">
    <strong>Por favor corrige los siguentes errores:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@stop