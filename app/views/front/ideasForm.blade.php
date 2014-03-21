@extends('layouts.layout')

@section('contend')
<section id='contend'>
    <div class="sube-tu-idea">
        <h2>Sube tu idea</h2>

        <p>Sube tu idea de producto ya y participa, dentro de poco podrías verla en las tiendas!</p>
        {{ Form::open(array('url' => 'sube-tu-idea/nueva', 'class' => 'dropzone', 'id'=>'form-sube-tu-idea')) }}

        <div class="input-contend">
            {{ Form::label('titulo', 'Dale un título a tu idea') }}
            <span id="titulo-label">30 caracteres restantes</span>
            {{ Form::text('titulo', null, array('id'=>'titulo','placeholder' => 'Con 2 o 3 palabras bastará','maxlength'=>'30')) }}


        </div>
        {{ Form::label('id_categorias', 'Categoría de tu idea') }}
        {{Form::select('id_categorias', $combobox)}}


        <div class="input-contend">
            {{ Form::label('descripcion', 'Describe tu idea en pocas palabras') }}
            <span id="descripcion-label">500 caracteres restantes</span>

            {{ Form::textarea('descripcion', null, array('id'=>'descripcion','placeholder' => '(Vende tu idea en un ascensor)', 'class' => 'text','maxlength'=>'500')) }}

        </div>
        <div class="input-contend">
            {{ Form::label('problematica', 'Describe la oportunidad o problemática que descubriste') }}
            <span id="problematica-label">1000 caracteres restantes</span>
            {{ Form::textarea('problematica', null, array('id'=>'problematica','placeholder' => '(Cuentanos del problema)', 'class' => 'text','maxlength'=>'1000')) }}
        </div>
        <div class="input-contend">
            {{ Form::label('solucion', 'Describe cómo solucionaste el problema') }}
            <span id="solucion-label">1000 caracteres restantes</span>
            {{ Form::textarea('solucion', null, array('id'=>'solucion','placeholder' => '(¿Cúal es tu solución?)
            ','class' => 'text','maxlength'=>'1000')) }}

        </div>

        <label>Sube tu imagen o link de tu vídeo aquí</label>

        <div class="imagen">
            <span id="name-file">Imágenes aquí o <a href="#">cárgalas desde tu ordenador</a></span>
            <input name="file" id="files" type="file" multiple="multiple"/>
        </div>

        <div class="input-contend">
            <span>youtube</span>
            {{ Form::label('url_video', 'Agrega el vínculo de tu video') }}
            {{ Form::text('url_video', null, array('placeholder' => 'http://')) }}
        </div>
        {{ Form::hidden('captchaSum', null,array('id'=> 'captcha')) }}
        <div class="show-captcha">

        </div>
        <div class="captcha">
            {{ Form::text('captcha', null, array('class' => 'result','maxlength' => '3')) }}
        </div>
        <input class="sumbit" type="submit" value="Envía tu idea">
        {{ Form::hidden('images', 'null', array('id' => 'imagesUpload')) }}
        {{ Form::close() }}


    </div>
</section>
@stop
@section('javascript')
{{HTML::script('js/upload.js')}}
{{HTML::script('js/ideasForm.js')}}
{{HTML::script('js/counter-max.js')}}
<script>
    $("#titulo").limitar({limite: 30, id_counter: "titulo-label"});
    $("#solucion").limitar({limite: 1000, id_counter: "solucion-label"});
    $("#problematica").limitar({limite: 1000, id_counter: "problematica-label"});
    $("#descripcion").limitar({limite: 500, id_counter: "descripcion-label"});
</script>
@stop