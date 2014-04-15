@extends('layouts.layout')

@section('contend')
<section id='contend'>

    <div class="trabaja-en-lemur">
        <h2>Trabaja en Lemur Studio</h2>
        <p>
            Nuestro equipo es lo mejor de lo mejor, no nos importa tus años de experiencia,
            tu edad ni tu religión, nos importa la pasión con la que seas capaz de trabajar,
            compartir en equipo, actitud positiva y talento!
        </p>
        <p>
            ¿Te gustaría pertenecer a nuestro equipo? Envíanos tus datos, estaremos en contacto contigo.
        </p>

        {{ Form::open(array('url' => 'envioTrabajo','class' => 'contact-form')) }}
            <label>Nombre<span>*</span></label>
            <input type="text" name="nombre">
            <label>Apellidos<span>*</span></label>
            <input type="text" name="apellidos">
            <label>Correo electrónico<span>*</span></label>
            <input type="text" name="email">
            <input class="sumbit" type="submit" value="Enviar">
        {{ Form::close() }}
    </div>
</section>
@stop
@section('javascript')

@if ($errors->any())
<script>

    var $popup = $('.popUp-container');
    $popup.addClass('show');


    var template = '';
    template += '<div id="contend-error">' +  '<h2>Por favor corrige los siguentes errores</h2><ul style="color: #ffffff">';

    @foreach ($errors->all() as $error)
    template += '<li>' +
        '{{$error}}' +
        '</li>';
    @endforeach
    template += '</ul></div>' ;
    $('#popUp-contend').append(template);

    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });
</script>

@endif
@if ($send == 1)
<script>

    var $popup = $('.popUp-container');
    $popup.addClass('show');


    var template = '';
    template += '<div id="contend-error">' +  '<h2>Gracias por escribirnos te responderemos cuanto antes</h2><ul style="color: #ffffff">';

    template += '</ul></div>' ;
    $('#popUp-contend').append(template);

    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });
</script>

@endif
@stop