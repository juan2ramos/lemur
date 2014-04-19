<?php
    $classHidden = (Auth::user()) ? 'hidden' : '';
    $classShow = (!Auth::user()) ? 'hidden' : '';
?>

<figure id="logo">

    {{ HTML::decode(HTML::link('/', HTML::image('images/logo.png','logo'))) }}
</figure>

<ul class="menu-responsive">
    <?php
    $menu = Menu::where('activo', '=', '1 order by id DESC')->get();
    $pieces = explode('/', Request::path());
    $sub = '';
    if(!empty($pieces[0])){
        $sub = ($pieces[0] == 'vota-por-una-idea' || $pieces[0] == 'detalle-idea')?'categorias':false;
    }
    if($pieces[0] == 'envioTrabajo'){
        $sub = 'trabaja-en-lemur';
    }
    if($pieces[0] == 'envioContacto'){
        $sub = 'contacto';
    }
    if($pieces[0] == 'registro'){
        $sub = '/';
    }

    ?>
    @foreach($menu as $link)
    <?php
    if(!$sub)
        $current = (Request::path() == $link->url)?'current':'';
    else
        $current = ($sub == $link->url)?'current':'';


    ?>
    <li class="">

        {{ HTML::decode(HTML::link($link->url, '<p>' .$link->texto. '</p>')) }}

    </li>
    @endforeach

</ul>


<button class="button-responsive">
    <span class="nav-bar"></span>
</button>
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