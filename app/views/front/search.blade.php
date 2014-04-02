@extends('layouts.layout')
@section('contend')
{{Form::hidden('date',$cierreCategoria,['id'=>'date'])}}
<section id='contend'>
    <div class="back">
        {{HTML::link('categorias','Volver')}}
    </div>
    <div class="vota-por-una-idea">
        @if(!empty($ideasImage))
        <h2>Resultado</h2>

        <p>Elige tu idea favorita y ayudala con tu voto, encontrarás información detallada de cada idea donde podrás
            dejar tus comentarios.</p>
        @else
            <h2>No hay resultados</h2>
        @endif
        <ul>
            @foreach($ideasImage as $key => $value)

            <?php
            $path = $value->imagen;
            $url = 'detalle-idea/' . $value->id
            ?>

            <li>
                {{HTML::image($path,'')}}
                {{HTML::link('votar',$value->numero_votos,
                ['id' => 'id'.$value->id, 'class' => 'izq', 'data-idea' => $value->id])}}


                {{HTML::link($url,'info',['class' => 'der'])}}
            </li>
            @endforeach

        </ul>
    </div>
</section>
@stop

@section ('javascript')
{{HTML::script('js/voto.js')}}
@stop