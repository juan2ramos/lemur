<?php
    $classHidden = (Auth::user()) ? 'hidden' : '';
    $classShow = (!Auth::user()) ? 'hidden' : '';
?>

<figure id="logo">

    {{ HTML::decode(HTML::link('/', HTML::image('images/logo.png','logo'))) }}
</figure>
<div id="contend-form">
    <a href="#" id="img-registrar" class="popup-link {{$classHidden}}">Regístrate</a>
    <a href="#" id="img-ingresar" class="popup-link {{$classHidden}}">Ingresa</a>
    {{HTML::link('logout', 'Cerrar sesión', ['class' => 'popup-link '.$classShow, 'id' => 'logout'])}}
    {{ Form::open(array('url' => 'search' )) }}
        <input type="text" name="word" placeholder="Buscar">
        <input type="submit" value="">
    {{ Form::close() }}
    <div id="header-info">
        @if(isset($crono))
        {{HTML::image('images/cronometro.png','cronometro',['class'=>'img-cronos'])}}

        @endif
        <div id="hours">
            @if(isset($crono))
            <dl>
                <div class="dt">
                    <dt>días</dt>
                    <dd id="dayNumber"> <span>:</span></dd>
                </div>
                <div class="dt">
                    <dt>horas</dt>
                    <dd id="hourNumber"><span>:</span></dd>
                </div>
                <div class="dt">
                    <dt>min.</dt>
                    <dd  id="minNumber"><span>:</span></dd>
                </div>
                <div class="dt">
                    <dt>seg.</dt>
                    <dd  id="secNumber"></dd>
            </dl>
            @endif
        </div>
        <div id="user-info" class ='{{ $classShow }}' >
            <p>@if(Auth::user()) {{Auth::user()->nombre}} @endif </p>
            {{HTML::decode(HTML::link('perfil','<span id="engranaje"></span>'))}}

            <figure id="user">
                <?php
                    $imageUser = (empty(Auth::user()->imagen))?'images/user.png':'upload/'.Auth::user()->imagen;
                ?>
                @if(Auth::user()) {{HTML::image($imageUser)}} @endif

            </figure>
        </div>
    </div>

</div>