@extends('layouts.layout')
@section('contend')
{{Form::hidden('date',$cierreCategoria,['id'=>'date'])}}
<section id='contend'>
    <div class="back">
        {{HTML::link('categorias','Volver')}}
    </div>
    <div class="vota-por-una-idea">
        @if(!empty($categoria))
        <h2>{{$categoria['nombre']}}</h2>

        <p>Elige tu idea favorita y ayudala con tu voto, encontrarás información detallada de cada idea donde podrás
            dejar tus comentarios.</p>
        @else
        <h2>No hay resultados de tu búsqueda.</h2>
        @endif
        <ul>
            @foreach($ideasImage as $value)

            <?php
            $path = $value['imagen'];
            $url = 'detalle-idea/' . $value['id']
            ?>

            <li>
                {{HTML::image($path,'',['class' => 'imagen-idea'])}}
                {{HTML::link('votar',$value['numero_votos'],
                ['id' => 'id'.$value["id"], 'class' => 'izq', 'data-idea' => $value["id"]])}}


                {{HTML::link($url,'info',['class' => 'der'])}}
            </li>
            @endforeach

        </ul>
    </div>
    <div id="paginacion">
        <?php $prev = ($get == 0)?'Anterior':HTML::link('vota-por-una-idea/'.$id.'?page='.($get-1),'Anterior');?>
        <div class="prev">{{$prev}}</div>
        <ul>

            <?php if ($count > 1):for ($i = 0; $i < $count; $i++):
                if ($get == $i):
                    $print = $i + 1;
                    echo('<li class="inactive">' . $print . '</li>');
                else:?>
                    <li> {{HTML::link('vota-por-una-idea/'.$id.'?page='.$i,$i+1)}}</li>
                <?php endif;endfor;endif; ?>

        </ul>
        <?php $next = ($get+1 == $count)?'Siguiente':HTML::link('vota-por-una-idea/'.$id.'?page='.($get+1),'Siguiente');?>
        <div class="next">{{$next}}</div>
    </div>
</section>
@stop

@section ('javascript')
{{HTML::script('js/voto.js')}}
{{HTML::script('js/countdown.js')}}
@stop