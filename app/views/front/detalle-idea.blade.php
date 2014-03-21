@extends('layouts.layout')

@section('contend')
{{Form::hidden('date',$cierreCategoria,['id'=>'date'])}}
<section id='contend'>
    <div class="detalle-idea">
        <div id="back-contend">
            <div class="back">
                {{HTML::link('vota-por-una-idea/'.$idea['id_categorias'],'Volver')}}

            </div>
            {{HTML::link('votar',$idea['numero_votos'],
            ['id' => 'id'.$idea['id'], 'class' => 'izq', 'data-idea' => $idea['id']])}}



        </div>
        <h2>{{$idea['titulo']}}</h2>

        <p>
            {{$idea['descripcion']}}
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

        <div id="info-idea">
            <figure>
                {{HTML::image('upload/'.$UserIdea["imagen"])}}
                <figcaption>{{$UserIdea['nombre']}}</figcaption>
            </figure>
            <p>Compartir</p>
            <ul>
                <li><a href="">{{HTML::image('images/facebook.png','facebook')}}</a></li>
                <li><a href="">{{HTML::image('images/twitter.png','Twitter')}}</a></li>
            </ul>
        </div>
        <h3>Oportunidad</h3>

        <p>{{$idea['problematica']}}</p>

        <h3>Solución</h3>

        <p>{{$idea['solucion']}}</p>

        <h3>Deja tu comentario</h3>
        {{ Form::open(array('url' => 'comentario', 'id'=>'form-comentario')) }}
        {{Form::hidden('id_idea',$idea['id'])}}
        <textarea id="text-comment" name="comentario"></textarea>
        <input type="submit" class="sumbit" value="Enviar">
        {{ Form::close() }}
    </div>
    <div class="popUp-container-slide">
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
                        <iframe width="500" height="315" src="{{$video}}" frameborder="0" allowfullscreen></iframe>

                    </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
@stop
@section ('javascript')
{{HTML::script('js/countdown.js')}}
{{HTML::script('js/voto.js')}}
{{HTML::script('js/comentario.js')}}
@stop