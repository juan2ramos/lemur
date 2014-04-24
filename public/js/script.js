$(function () {



    $('.button-responsive ').on("click", function () {

        $('.menu-responsive').toggleClass('open-menu');

    });

    $('#facebookG').addClass('show');

    $('#closeBack').click(function () {
        $('.popUp-container-slide').removeClass('opacity');
        var youtube = jQuery('iframe[src*="youtube"]');
        var vimeo = jQuery('iframe[src*="vimeo"]');
        if ( youtube.length > 0 || vimeo.length > 0 ){

            var src = youtube.attr('src');
            youtube.attr('src', '');
            youtube.attr('src', src);
            var srcvimeo = vimeo.attr('src');
            vimeo.attr('src', '');
            vimeo.attr('src', srcvimeo);
        }


    });

$('#productos').on('click',function(e){

    e.preventDefault();
    var $popup = $('.popUp-container');
    $popup.addClass('show');

    var template = '';
    template +=
        '<div id="contend-error">' +
            '<h2>¡Muy pronto productos para tí!</h2>';



    $('#popUp-contend').append(template);
    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });
});





    $('#form-register').on('submit', function (e) {
        e.preventDefault();
        $('#facebookG').addClass('show');
        var str = $(this).serialize();
        $.post($(this).attr('action'), str, responseFormRegister, 'json');
    });
    $('#form-login').on('submit', function (e) {
        e.preventDefault();
        $('#facebookG').addClass('show');
        var str = $(this).serialize();
        $.post($(this).attr('action'), str, responseFormlogin, 'json');
    });

    var allPanels = $('.accordion > dd').hide();

    $('.accordion > dt > .expand').click(function () {
        $this = $(this);
        $target = $this.parent().next();


        if ($this.hasClass('open')) {
            $this.removeClass('open');
            $this.css("backgroundImage", "url(images/more.png)");
            allPanels.removeClass('active').slideUp();
        }
        else {
            $this.addClass('open');
            if (!$target.hasClass('active')) {
                allPanels.removeClass('active').slideUp();
                $target.addClass('active').slideDown();

                $('.expand').css("backgroundImage", "url(images/more.png)");
                $this.css("backgroundImage", "url(images/menos.png)");
            }
        }
        return false;
    });
    $('.popup-link').click(function () {
        popUps($(this))
     });
    $('#about').click(function () {
        $('.popUp-container').addClass('show');
        $('.popUp-container').addClass('about-contend');
        $('#contend-about').removeClass('hidden');
        $('.close').click(function () {
            $('#contend-about').addClass('hidden');
            $('.popUp-container').removeClass('show');
            $('.popUp-container').removeClass('about-contend');

        });

    });


    if ($('.slider').length > 0) {
        $('.slider').flexslider({
            animation: "slide",
            slideshow: true,
            prevText: "<",
            nextText: ">",
            smoothHeight: true


        });
    }
    $('#slide').flexslider({
        animation: "slide",
        slideshow: true,
        prevText: "<",
        nextText: ">"


    });
    $('#slide img').click(function () {
        $('.popUp-container-slide').addClass('opacity');
        $('#close').click(function () {

            var youtube = jQuery('iframe[src*="youtube"]');
            var vimeo = jQuery('iframe[src*="vimeo"]');
            if ( youtube.length > 0 || vimeo.length > 0 ){

                var src = youtube.attr('src');
                youtube.attr('src', '');
                youtube.attr('src', src);
                var srcvimeo = vimeo.attr('src');
                vimeo.attr('src', '');
                vimeo.attr('src', srcvimeo);
            }

            $('.popUp-container-slide').removeClass('opacity');
        });

    });


    var s = skrollr.init({
        render: function (data) {
            //Debugging - Log the current scroll position.
            //console.log(data.curTop);
        }
    });
    $(document).on('keyup',function(e) {

        var scroll = $(window).scrollTop(),
            positionScroll = [0, 1480, 2060 , 3960, 5390, 8000, 9120, 11440, 13810, 15230, 16000, 17000, 18100, 21000, 22900];
        for (var i = 0; i < positionScroll.length; i++) {

            if (scroll < positionScroll[i]) {

                if (e.which == 38) {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, 1000);

                } else if(e.which == 40){
                    $("body").animate({scrollTop: positionScroll[i]}, 1000);
                }
                return false
            } else if (scroll == positionScroll[i]) {
                if (e.which == 38) {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, 1000);
                } else if(e.which == 40) {
                    $("body").animate({scrollTop: positionScroll[i + 1]}, 1000);
                }
                return false
            }
            ;

        }
        ;

    });

    $('.arrows').on('click', function (e) {
        e.preventDefault();
        var action = $(this).attr("id");
        var scroll = $(window).scrollTop(),
            positionScroll = [0, 1480, 2060 , 3960, 5390, 8000, 9120, 11440, 13810, 15230, 16000, 17000, 18100, 21000, 22900];

        for (var i = 0; i < positionScroll.length; i++) {

            if (scroll < positionScroll[i]) {

                if (action == 'up') {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, 1000);

                } else {
                    $("body").animate({scrollTop: positionScroll[i]}, 1000);
                }
                return false
            } else if (scroll == positionScroll[i]) {
                if (action == 'up') {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, 1000);
                } else {
                    $("body").animate({scrollTop: positionScroll[i + 1]}, 1000);
                }
                return false
            }
            ;

        }
        ;

    });

    var num1 = Math.floor((Math.random() * 100) + 1),
        num2 = Math.floor((Math.random() * 100) + 1),
        result = num1 + num2;
    $('.show-captcha').text(num1 + " + " + num2);
    $('#captcha').val(result);

});
var counter = $('#change');

$(window).load(function(){

    $('#facebookG').removeClass('show');
    $('body').removeClass('no-image');
    $('#contend-index').removeClass('hidden');
    $('#flecha-inicio').removeClass('hidden');
    resizeImg( $('#info-idea-fig img') );
    $('.imagen-idea').each(function() {

        ratio = 1;

        screenWidth =  $(this).width();
        screenHeight =  $(this).height();

        if (screenWidth/screenHeight > ratio) {

            if(screenWidth/screenHeight< 1.3){
                $(this).height("100%");
                $(this).width("100%");

            }else{
                $(this).height("100%");
                $(this).width("auto");
                left = screenWidth*130/screenHeight - 174;
                $(this).css({
                    'position':'absolute',
                    'left': -left,
                    'top':0
                });
            }

        } else {
            $(this).width("100% ");
            $(this).height("auto");
        }


    });


});

function resizeImg(img){
    ratio = 1;

    screenWidth =  img.width();
    screenHeight =  img.height();

    if (screenWidth/screenHeight > ratio) {

        if(screenWidth/screenHeight< 1.3){
            img.height("100%");
            img.width("100%");

        }else{
            img.height("100%");
            img.width("auto");
            left = ((screenWidth*45)/(screenHeight))-45;
            img.css({
                'position':'absolute',
                'left': -left,
                'top':0
            });
        }

    } else {
        img.width("100% ");
        img.height("auto");
    }
}
function popUps(elements){
    $this = elements;
    $('.popUp-container').addClass('show');

    $('.close').click(function () {
        $('.popUp-container').removeClass('show');
        $('#ingresa-cuenta').addClass('hidden');
        $('#registra-cuenta').addClass('hidden');
    });

    if ($this.is('#img-ingresar')) {
        $('#ingresa-cuenta').removeClass('hidden');
        $('#popUp-contend').removeClass("registra-cuenta-back");
        $('#popUp-contend').addClass("popup-back");
    } else {
        $('#registra-cuenta').removeClass('hidden');
        $('#popUp-contend').removeClass("popup-back");
        $('#popUp-contend').addClass("registra-cuenta-back");
    }
}
function popUpStart(){
    popUps($('#registra-cuenta'));
}
count(counter, 100, 850, 300);
function count(elem, startnum, endnum, time) {

    var curnum = startnum;
    elem.text(curnum);

    var speed = time;


    var timer = window.setInterval(function () {


        if (curnum < endnum) {


            curnum = curnum + 10;

            elem.text(curnum);
        } else {

            curnum = 100;

            elem.text(curnum);
        }

    }, speed);

}
function responseFormRegister(data) {
    $('#facebookG').removeClass('show');
    var flag = true;
    jQuery.each( $('#form-register input:text'), function( i, val ) {

        if($(this).val()){
            flag = false;
            return false;
        }


    });
    console.log(flag)
    if(flag){
        $('#registra-cuenta').find('h2').text('Debes diligenciar todos los campos.');
        return true;
    }

    if (data.success == 1){
        $('#registra-cuenta').find('h2').text('Casi listo! verifica tu correo para completar el registro. ¡Que te diviertas!');


    }else{
        for (var key in data) {
            $('#registra-cuenta').find('h2').text(data[key]);

            break;
        }
    }
}
$('#flecha-inicio').on('click',function(){
$("body").animate({scrollTop: 0}, 3000);
});
function responseFormlogin(data) {
    $('#facebookG').removeClass('show');
    if (data.success == 1){
        location.reload();
    }
    else{
        $('#ingresa-cuenta').find('h2').text(' ¡Ups! verifica que tus datos estén correctos.');
    }
}


$( "#files" )
    .mouseenter(function() {
        $('#name-file a').css("color","#971a1e");
    })
    .mouseleave(function() {
        $('#name-file a').css("color","#F7931E");

    });

//captcha






