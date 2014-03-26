@extends('layouts.layout')

@section('contend')
<section id='contend'>
    <div class="categorias">
        <h2>Categorías</h2>

        <p>Estas son las categorías vigentes para que puedas votar por tus ideas favoritas.</p>


        @foreach($categorias as $key => $value)
        <?php
        $href = '#';
        $active = '';
        if ($value->estado == 1):
            $href = 'vota-por-una-idea/' . $value->id;
            $active = '<img src="images/activa.png" class="activa">';
        endif
        ?>


        <a href="{{ URL::to($href) }}" class="link">
            {{$active}}
            <div class="contend-img"><img src="images/{{$value->imagen}}"></div>
            <div class="contend-p"><p>{{$value->nombre}}</p></div>
        </a>
        @endforeach

    </div>
</section>
@stop