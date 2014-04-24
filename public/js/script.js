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





