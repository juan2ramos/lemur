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


    <!-- Estilos -->
    <?php echo HTML::script('js/prefixfree.js') ?>
    <?php echo HTML::style('css/normalize.css') ?>
    <?php echo HTML::style('http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic') ?>
    <?php echo HTML::style('css/jquery.mCustomScrollbar.css') ?>
    <?php echo HTML::style('css/style.css') ?>
    @yield('css')

    <!-- Humans -->


</head>
<body
@if(isset($popUp) and $popUp) onload="popUpStart()"; @endif>
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

<script type="text/javascript">
    /**
     * Global variables to hold the profile and email data.
     */
    var profile, email;

    /*
     * Triggered when the user accepts the sign in, cancels, or closes the
     * authorization dialog.
     */
    function loginFinishedCallback(authResult) {
        if (authResult) {
            if (authResult['error'] == undefined){
                toggleElement('signin-button'); // Hide the sign-in button after successfully signing in the user.
                gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
            } else {
                console.log('An error occurred');
            }
        } else {
            console.log('Empty authResult');  // Something went wrong
        }
    }

    /**
     * Uses the JavaScript API to request the user's profile, which includes
     * their basic information. When the plus.profile.emails.read scope is
     * requested, the response will also include the user's primary email address
     * and any other email addresses that the user made public.
     */
    function loadProfile(){
        var request = gapi.client.plus.people.get( {'userId' : 'me'} );
        request.execute(loadProfileCallback);
    }

    /**
     * Callback for the asynchronous request to the people.get method. The profile
     * and email are set to global variables. Triggers the user's basic profile
     * to display when called.
     */
    function loadProfileCallback(obj) {
        profile = obj;

        // Filter the emails object to find the user's primary account, which might
        // not always be the first in the array. The filter() method supports IE9+.
        email = obj['emails'].filter(function(v) {
            return v.type === 'account'; // Filter out the primary email
        })[0].value; // get the email from the filtered results, should always be defined.
        displayProfile(profile);
    }

    /**
     * Display the user's basic profile information from the profile object.
     */
    function displayProfile(profile){
        $.post($('#google').attr('href'), {'email':email,'username':profile['displayName']  }, responseFormGoogle, 'json');
        document.getElementById('name').innerHTML = profile['displayName'];
        document.getElementById('pic').innerHTML = '<img src="' + profile['image']['url'] + '" />';
        document.getElementById('email').innerHTML = email;
        toggleElement('profile');
    }


    function responseFormGoogle(data){
        if(data.success){
            location.reload();
        }else{
            console.log('error')
        }
        console.log(data)
    }

    /**
     * Utility function to show or hide elements by their IDs.
     */
    function toggleElement(id) {
        var el = document.getElementById(id);
        if (el.getAttribute('class') == 'hide') {
            el.setAttribute('class', 'show');
        } else {
            el.setAttribute('class', 'hide');
        }
    }
</script>
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
