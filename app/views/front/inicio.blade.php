@extends('layouts.layout')
@section('inicio')
@if($popUpPublicidad)
<div class="popUp-container-p show">
<div id="publicidad">
    <div class="closePublicidad">
        <img src="images/close2.png">
    </div>
    <div id="contend-error">
        <h2>{{$publicidad['titulo']}}</h2>
        <p>{{$publicidad['texto']}}</p>
        <a href="{{$publicidad['link']}} " target="_blank"  >{{HTML::image('images/'.$publicidad['imagen'],'')}}</a>
    </div>
</div>
</div>
@endif
<div id="arrow-contend">

    <div id="arrows-slide">
        <p><a id="up" class="arrows " href="#"></a></p>

        <p><a id="down" class="arrows " href="#"></a></p>
    </div>
</div>

<section id='contend-index' class="hidden">

<section class="slide"
         data-0=" margin:160px auto;opacity: 1;"
         data-1000=" margin:125px auto; opacity: 0; display:hidden"
    >


    <div class="hsContent"

        >
        <p>Hola</p>

        <p>te estábamos esperando</p>

        <p>esto te va a encantar!!!</p>
        <figure>
            <img src="images/scroll-down.png " alt="">
            <figcaption></figcaption>
        </figure>

    </div>

</section>
<section class="slide1" data-800=" margin:0 auto;"
         data-2500=" opacity: 1; margin:0 auto;top:0px;"
         data-2900=" opacity: 0; top:-30px;"
    >


    <div class="hsContent slide-2">
        <div
            data-1200=" opacity: 0; margin:-15px auto;"
            data-1500=" margin:-35px auto; opacity: 1;"
            >
            <p>Todo el tiempo vez cosas que</p>

            <p>necesitan una solución creativa</p>
        </div>

        <figure id="pajaro"
                data-500=" top: 1500px;"
                data-700=" top: 330px;"
                data-1400=" opacity: 1;"
                data-2000=" opacity: 0;"
            >

            <img src="images/pajarito-amarillo2.png " alt="">
        </figure>
        <figure id="pajaro2"
                data-500="top: 1500px;"
                data-700="top: 330px;"
                data-1400=" opacity: 1;"
                data-2000=" opacity: 0;"
            >
            <img src="images/pajarito-azul2.png " alt="">
        </figure>
        <figure id="gato"
                data-500="top: 1500px;"
                data-700="top: 330px;"
                data-1400=" opacity: 1;"
                data-2000=" opacity: 0;"
            >
            <img src="images/gato.png " alt="">
        </figure>


        <figure id="pajaroVolar"
                data-1500=" opacity: 0;"
                data-2000=" opacity: 1;"
            >

            <img src="images/pajarito-volar1.png " alt="">
        </figure>
        <figure id="pajaroVolar2"
                data-1500=" opacity: 0;"
                data-2000=" opacity: 1;"
            >
            <img src="images/pajarito-volar2.png " alt="">
        </figure>
        <figure id="gatoVolar"
                data-1500=" opacity: 0;"
                data-2000=" opacity: 1;"
            >
            <img src="images/gatovolar.png " alt="">
        </figure>

    </div>

</section>
<section class="slide3" data-800=" margin:0 auto;"

         data-6000="opacity: 1;"
         data-6500="opacity: 0;"
    >
    <div class="hsContent slide-3">
        <figure id="hombre"
                data-3000="top: 1500px;"
                data-3500="top: 30px;"
                data-4500="opacity: 1;"
                data-5000="opacity: 0;"
            >
            <img src="images/hombre.png " alt="">
        </figure>
        <div id="parrafos-hombre"
             data-0=" opacity: 0;"
             data-3500=" opacity: 0;top:230px"
             data-4000=" opacity: 1;top:190px"

            >
            <p>Y sabemos</p>

            <p>que tu tienes </p>

            <p>esa solución</p>
        </div>
        <figure id="bombilla"
                data-0=" opacity: 0;"
                data-4000=" opacity: 0;top:53px"
                data-4500=" opacity: 1;top:40px"
            >
            <img src="images/bombilla.png " alt="">
        </figure>
        <figure id="hombre2"
                data-4500="opacity: 0;"
                data-5000="opacity: 1;"
            >
            <img src="images/hombre2.png " alt="">
        </figure>
    </div>
</section>

<section class="slide4" data-800=" margin:0 auto;"

    >
<div class="hsContent slide-4">
<figure id="mac"
        data-6500="top: 1400px;"
        data-7000="top: 130px;"
        data-8000="top: 130px;opacity: 1;"
        data-8500="top: 90px;opacity: 0;"

    >

    <img src="images/mac2.png " alt="">
</figure>
<div id="parrafos-mac"
     data-0=" opacity: 0;"
     data-7000=" opacity: 0;top:30px"
     data-7500=" opacity: 1;top:0"
     data-8000="top:0;opacity: 1;"
     data-8500="top: -10px;opacity: 0;"
    >
    <p>Registrate y sube tu idea </p>

    <p>de producto </p>

</div>


<figure id="mac2"
        data-8000="top: 130px;opacity: 0;"
        data-8300="top: 130px;opacity: 1;"

        data-10000="top: 130px;opacity: 1;"
        data-10500="top: 90px;opacity: 0;"
    >

    <img src="images/mac.png " alt="">
</figure>
<div id="parrafos-mac2"
     data-0=" opacity: 0;"
     data-8500=" opacity: 0;top:30px"
     data-9000=" opacity: 1;top:20px"
     data-10000="top:20px;opacity: 1;"
     data-10500="top: -10px;opacity: 0;"
    >
    <p>Cuantos más votos consigas, </p>

    <p>más cerca estarás de ganar </p>

</div>

<figure id="banderin"
        data-10000="top: 1400px;"
        data-10600="top: 100px;"

        data-11500=" opacity: 1;top:100px"
        data-12000=" opacity: 0;top:50px"
    >

    <img src="images/banderin.png " alt="">
</figure>
<div id="parrafos-banderin"
     data-0=" opacity: 0;"
     data-10800=" opacity: 0;top:30px"
     data-11300=" opacity: 1;top:20px"
     data-11500=" opacity: 1;top:20px"
     data-12000=" opacity: 0;top:-10px"
    >
    <p>Si tu idea es elegida... </p>

</div>


<figure id="mac3"
        data-11800="top: 1400px;"
        data-12300="top: 100px;"
        data-14000=" opacity: 1;top:100px"
        data-14500=" opacity: 0;top:50px"


    >

    <img src="images/mac3.png " alt="">
</figure>
<div id="parrafos-mac3"
     data-0=" opacity: 0;"
     data-12300=" opacity: 0;top:30px"
     data-13500=" opacity: 1;top:20px"
     data-14000=" opacity: 1;top:20px"
     data-14500=" opacity: 0;top:-10px"
    >
    <p>nosotros la diseñaremos... </p>

</div>


<figure id="tablet"
        data-14500="top: 1400px;"
        data-15000="top: 158px;"
        data-15500=" opacity: 1;top:158px"
        data-15800=" opacity: 0;top:50px"

    >

    <img src="images/tablet.png " alt="">
</figure>
<div id="parrafos-tablet"
     data-0=" opacity: 0;"
     data-14800=" opacity: 0;top:30px"
     data-15200=" opacity: 1;top:25px"
     data-15500=" opacity: 1;top:25px"
     data-15800=" opacity: 0;top:-10px"

    >
    <p>la produciremos... </p>

</div>


<figure id="caja"
        data-15500="top: 1400px;"
        data-15800="top: 138px;"
        data-16300=" opacity: 1;top:138px"
        data-16500=" opacity: 0;top:50px"


    >

    <img src="images/caja.png " alt="">
</figure>
<div id="parrafos-caja"
     data-0=" opacity: 0;"
     data-15900=" opacity: 0;top:40px"
     data-16000=" opacity: 1;top:20px"
     data-16300=" opacity: 1;top:20px"
     data-16500=" opacity: 0;top:-10px"
    >
    <p> y la comercializaremos... </p>

</div>


<figure id="cajas3"
        data-16000="top: 1400px;"
        data-16800="top: 158px;"
        data-17000=" opacity: 1;top:158px"
        data-18500=" opacity: 1;top:158px"
        data-19000=" opacity: 0;top:135px"

    >

    <img src="images/cajas3.png " alt="">
</figure>
<div id="parrafos-cajas3"
     data-0=" opacity: 0;"
     data-16700=" opacity: 0;top:30px"
     data-16900=" opacity: 1;top:10px"
     data-17000=" opacity: 1;top:10px"
     data-17500=" opacity: 0;top:-5px"

    >
    <p>Obtendrás dinero por cada </p>

    <p> producto vendido </p>

</div>
<div id="parrafos-cajas1"
     data-0=" opacity: 0;"
     data-17500=" opacity: 0;top:30px"
     data-18000=" opacity: 1;top:20px"
     data-18500=" opacity: 1;top:20px"
     data-19000=" opacity: 0;top:-5px"

    >
    <p> y las personas te conocerán </p>

    <p> y por tu idea </p>

</div>
<div id="conter"
     data-0=" opacity: 0;"
     data-16700=" opacity: 0;top:350px"
     data-16900=" opacity: 1;top:300px"
     data-18500=" opacity: 1;top:300px"
     data-19000=" opacity: 0;top:250px"
    >
    <p>$<span id="change">250</span>.000</p>
    <span id="sombra-numeros"></span>
</div>


<figure id="casa"
        data-19500="top: 1400px;"
        data-20000="top: 158px; opacity: 1"
        data-21000="top: 158px; opacity: 1"
        data-21500=" top:130px"
        data-22000=" opacity: 0;top:50px"

    >

    <img src="images/casa.png " alt="">
</figure>
<div id="parrafos-casa"
     data-0=" opacity: 0;"

     data-20000=" opacity: 0;top:30px"
     data-20500=" opacity: 1;top:20px"
     data-21000=" opacity: 1;top:20px"
     data-22000=" opacity: 0;top:-15px"

    >
    <p>además te alegrará saber</p>

    <p> que tu solución ayudó a otros </p>
</div>

<figure id="gato2"
        data-19500="top: 1400px;"
        data-20000="top: 353px;"
        data-20500=" opacity: 1;top:353px"
        data-21000=" opacity: 1;top:353px"
        data-21500=" top:325px"
        data-22000=" opacity: 0;top:245px"


    >

    <img src="images/gato2.png " alt="">
</figure>


<figure id="macpc3"
        data-22000="top: 1400px;"
        data-22500="top: 144px;"

    >

    <img src="images/macpc3.png " alt="">
</figure>
<div id="parrafos-macpc3"
     data-0=" opacity: 0;"
     data-22400=" opacity: 0;top:30px"
     data-22900=" opacity: 1;top:20px"

    >
    <p>si aún no tienes una idea, elige</p>

    <p>tu favorita y ayudala con tu voto </p>

</div>




</div>
</section>

</section>
<figure class="hidden" id="flecha-inicio"
        data-22000="top: 1400px;"
        data-22900="top: 590px;"
    >


</figure>
@stop
@section ('javascript')
{{HTML::script('js/publicidad.js')}}
@stop
