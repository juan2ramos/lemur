$(function () {

    $('#form-password').on("submit", function (e) {
        e.preventDefault();
        var fields;
        fields = $( this ).serialize();
        $('#facebookG').addClass('show');
        $.post($(this).attr('action'), fields, responseFormPass, 'json');

    });
});
function responseFormPass(data) {
    $('#facebookG').removeClass('show');
    var $popup = $('.popUp-container');
    $popup.addClass('show');

    var template = '';
    if (data.success == 0) {

        template +=
            '<div id="contend-error">' +
                '<h2>Error</h2><ul style="color: #ffffff">';
            template += '<li>Usuario no encontrado</li>'
    }else {
        template +=
            '<div id="contend-error">' +
                '<h2>Tu mensaje se ha enviado exitosamente! Revisa tu correo. </h2><ul style="color: #ffffff">';

    }

    $('#popUp-contend').append(template);
    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });

}