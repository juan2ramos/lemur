<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<head>

    <title>@section('title')
        Lemur
        @show
    </title>

    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta name="author" content="juan2ramos"/>
    <meta name="description" content="Inicio"/>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    @yield('metas')

    <!-- Estilos -->
    <?php echo HTML::script('js/prefixfree.min.js') ?>
    <?php echo HTML::style('css/normalize.css') ?>
    <?php echo HTML::style('http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic') ?>
    <?php echo HTML::style('css/jquery.mCustomScrollbar.css') ?>
    <?php echo HTML::style('css/style.css') ?>
    @yield('css')

    <!-- Humans -->


</head>
<body class="no-image"
@if(isset($popUp) and $popUp) onload="popUpStart()"; @endif

>
<div id="body"></div>
<div class="wrapper">
    <header>
        @include('front.includes.header')
    </header>
    <nav class="">
        @include('front.includes.nav')
    </nav>


    @yield('contend')


    <ul id="network">
        @section('navigation')
            <li>
        <div>
             <div style="position:relative;width:150px;height:23px;overflow:hidden;margin-top:8px">
            <div style="position:absolute;top:-50px;">
             <iframe scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:150pxpx; height:65px;padding-left:0px; padding-top:10px;" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Flemurstudio.com.co&amp;width=150px&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=65&amp;appId=706814422713940"></iframe>
             </div>
        </div></div></li>
        <li>

            {{ HTML::decode(HTML::link('#', HTML::image('images/signo.png','logo'),['id' => 'about'])) }}


        </li>
        <li>
            {{ HTML::decode(
            HTML::link('https://www.facebook.com/lemurstudio.com.co',
            HTML::image('images/facebook.png','facebook'),
            array('title' => 'facebook','target' => '_blank')
            )
            )}}

        </li>
        <li>
            {{ HTML::decode(
            HTML::link('https://twitter.com/LemurStudio1',
            HTML::image('images/twitter.png','twitter'),
            array('title' => 'twitter','target' => '_blank')
            )
            )}}
        </li>
        @show
    </ul>
</div>
<footer>
    @include('front.includes.footer')
</footer>

<div class="popUp-container">
    @include('front.includes.popUp')
</div>

@yield('inicio')
<div id="facebookG">
    <div id="blockG_1" class="facebook_blockG">
    </div>
    <div id="blockG_2" class="facebook_blockG">
    </div>
    <div id="blockG_3" class="facebook_blockG">
    </div>
</div>
<!-- JavaScript -->
<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') ?>
<?php echo HTML::script('js/jquery.flexslider-min.js') ?>
<?php echo HTML::script('js/skrollr.min.js') ?>
<?php echo HTML::script('js/script.js') ?>
<?php echo HTML::script('js/jquery.mCustomScrollbar.concat.min.js') ?>
@yield('javascript')
@if (!Auth::check())


{{HTML::script('https://apis.google.com/js/client:plusone.js')}}
@endif


<script>
    $("#contend").mCustomScrollbar({
        scrollButtons: {
            enable: true
        }
    });
</script>
</body>
</html>
