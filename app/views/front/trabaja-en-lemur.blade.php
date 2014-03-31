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