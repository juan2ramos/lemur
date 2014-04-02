@extends('layouts.layout')
@section ('title') {{$idea[0]['titulo']}} @stop
@section('metas')
<meta property="og:url" content="www.lemurstudio.com.co" />
<meta property="og:title" content="{{$idea[0]['titulo']}}" />
<meta property="og:description" content="Lemur Studio es una plataforma donde puedes sacarle provecho a tus ideas, visítanos y entérate del resto." />
<?php $url = 'http://aplicacion.lemurstudio.com.co/upload/' . $images[0]['url'] ?>
<meta property="og:image" content="{{$url}}" />
@stop
@section('contend')
{{Form::hidden('date',$cierreCategoria,['id'=>'date'])}}
<section id='contend'>
    <div class="detalle-idea">
        <div id="back-contend">
            <div class="back">
                {{HTML::link('vota-por-una-idea/'.$idea[0]['id_categorias'],'Volver')}}

            </div>
            {{HTML::link('votar',$idea[0]['numero_votos'],
            ['id' => 'id'.$idea[0]['id'], 'class' => 'izq', 'data-idea' => $idea[0]['id']])}}



        </div>
        <h2>{{$idea[0]['titulo']}}</h2>

        <p>
            {{$idea[0]['descripcion']}}
        </p>

        <div id="slide">
            <ul class="slides">
                @foreach($images as $value)

                <li>
                  <span class="caption">
                      <?php $url = 'upload/' . $value['url'] ?>
                      {{HTML::image($url)}}
                   </span>
                </li>
                @endforeach
                @if($video)
                    <li>
                        {{HTML::image('images/play.jpg')}}
                    </li>

                @endif
            </ul>
        </div>
098Y
        <div id="info-idea">
            <figure>
                {{HTML::image('upload/'.$UserIdea["imagen"])}}
                <figcaption>{{$UserIdea['nombre']}}</figcaption>
            </figure>
            <p>Compartir</p>
            <ul>

                <li>
   
        <p>{{$idea[0]['problematica']}}</p>

        <h3>Solución</h3>

        <p>{{$idea[0]['solucion']}}</p>

        <h3>Deja tu comentario</h3>
        {{ Form::open(array('url' => 'comentario', 'id'=>'form-comentario')) }}
        {{Form::hidden('id_idea',$idea[0]['id'])}}
        <textarea id="text-comment" name="comentario"></textarea>
        <input type="submit" class="sumbit" value="Enviar">
        {{ Form::close() }}
        <section id="comentarios-conted">
        @foreach($comentarios as $value)

            @if($value['pivot']['estado'] == 1)
            <article >
                <span>{{$value["nombre"]}}</span>
                {{$value['pivot']['comentario']}}
            </article>
            @endif
        @endforeach
        </section>
    </div>
    <div class="popUp-container-slide">
        <div id="closeBack"></div>
        <div class="contend-slider">
            <div class="close" id="close">
                {{HTML::image('images/close2.png')}}
            </div>
            <div class="slider">
                <ul class="slides">
                    @foreach($images as $value)
                    <li>
                                        <span class="caption">
                                        <?php $url = 'upload/' . $value['url'] ?>
                                            {{HTML::image($url)}}
                                        </span>
                    </li>
                    @endforeach
                    @if($video)

                    <li>
                        <iframe id="player"  src="http://www.youtube.com/embed/{{$video}}?rel=0&amp;enablejsapi=1"></iframe><br>

                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<script>
    var player;
    function onYouTubeIframeAPIReady() {player = new YT.Player('player');}
    if(window.opera){
        addEventListener('load', onYouTubeIframeAPIReady, false);
    }
</script>
@stop
@section ('javascript')
{{HTML::script('js/countdown.js')}}
{{HTML::script('js/voto.js')}}
{{HTML::script('js/comentario.js')}}

@stop