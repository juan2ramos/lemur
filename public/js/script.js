$(function () {



$('#productos').on('click',function(e){

    e.preventDefault();
    var $popup = $('.popUp-container');
    $popup.addClass('show');

    var template = '';
    template +=
        '<div id="contend-error">' +
            '<h2>Muy pronto Productos</h2><ul style="color: #ffffff">';


    template += '<li>muy pronto productos</li>'

    template += '</ul></div>' ;
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
            $('.popUp-container-slide').removeClass('opacity');

        });

    });


    var s = skrollr.init({
        render: function (data) {
            //Debugging - Log the current scroll position.
            //console.log(data.curTop);
        }
    });

    $('.arrows').on('click', function (e) {
        e.preventDefault();
        var action = $(this).attr("id");
        var scroll = $(window).scrollTop(),
            positionScroll = [0, 1480, 2060 , 3960, 5390, 8000, 9120, 11440, 13810, 15230, 16000, 17000, 18100, 20000, 21898];

        for (var i = 0; i < positionScroll.length; i++) {

            if (scroll < positionScroll[i]) {
                console.log(action)
                if (action == 'up') {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, '4000');

                } else {
                    $("body").animate({scrollTop: positionScroll[i]}, '4000');
                }
                return false
            } else if (scroll == positionScroll[i]) {
                if (action == 'up') {
                    $("body").animate({scrollTop: positionScroll[i - 1]}, '4000');
                } else {
                    $("body").animate({scrollTop: positionScroll[i + 1]}, '4000');
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

count(counter, 0, 850, 500);

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
function count(elem, startnum, endnum, time) {

    var curnum = startnum;
    elem.text(curnum);

    var speed = time;


    var timer = window.setInterval(function () {


        if (curnum < endnum) {


            curnum = curnum + 50;

            elem.text(curnum);
        } else {

            curnum = 50;

            elem.text(curnum);
        }

    }, speed);

}
function responseFormRegister(data) {
    $('#facebookG').removeClass('show');
    if (data.success == 1){
        location.reload();
    }
    else{


        for (var key in data) {
            $('#registra-cuenta').find('h2').text(data[key]);
            console.log(data[key])
            break;
        }
    }
}
function responseFormlogin(data) {
    $('#facebookG').removeClass('show');
    if (data.success == 1){
        location.reload();
    }
    else{
        $('#ingresa-cuenta').find('h2').text('Usuario y/o contraseña incorrecta');
    }
}

//files


//captcha






