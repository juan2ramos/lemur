$(function () {

    $('.izq').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('idea'),
            href = $(this).attr('href');
        $('#facebookG').addClass('show');
        $.post(href, {id: id}, responseFormVotos, 'json');
    });

});
function responseFormVotos(data) {
    $('#facebookG').removeClass('show');
    if (data.success == 0) {
        var $popup = $('.popUp-container');
        $popup.addClass('show');

        var template = '';
        template +=
            '<div id="contend-error">' +
                '<h2>Error</h2><ul style="color: #ffffff">';


            template += '<li>¡Ups! sólo puedes votar una vez por idea.</li>'

        template += '</ul></div>' ;
        $('#popUp-contend').append(template);
        $('.close').on('click', $('body'), function () {
            $popup.removeClass('show');
            template = "wew";
            $('#contend-error').remove();
        });
    } else if (data.success == 2) {
        popUps($('#img-ingresar'));
    }
    else {
        $('#id' + data.id).text(data.votos);
    }


}