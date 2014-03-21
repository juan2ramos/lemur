$(function () {

    //form
    $('#form-sube-tu-idea').on("submit", function (e) {
        e.preventDefault();
        var fields;
        fields = $(':input').serializeArray();
        $('#facebookG').addClass('show');
        $.post($(this).attr('action'), fields, responseForm, 'json');

    });
    function responseForm(r) {
        $('#facebookG').removeClass('show');
        if (r.success == 1) {

            var $popup = $('.popUp-container');
            $popup.addClass('show');

            var template = '';
            template +=
                '<div id="contend-error">' +
                    '<h2>tu idea a sido subida exitosamente!!</h2><ul style="color: #ffffff">';
            template += '<li>Gracias</li>';

            template += '</ul></div>' ;
            $('#popUp-contend').append(template);
            $('.close').on('click', $('body'), function () {
                window.location.href = 'categorias';
            });
        }
        else {
            var $popup = $('.popUp-container');
            $popup.addClass('show');

            var template = '';
            template +=
                '<div id="contend-error">' +
                    '<h2>Error</h2><ul style="color: #ffffff">';

            for (var key in r) {
                template += '<li>Campo: ' + key + ' Tipo de error: ' + r[key] +
                    '</li>'
            }
            template += '</ul></div>' ;
            $('#popUp-contend').append(template);
            $('.close').on('click', $('body'), function () {
                $popup.removeClass('show');
                template = "wew";
                $('#contend-error').remove();
            });

        }

    }
});