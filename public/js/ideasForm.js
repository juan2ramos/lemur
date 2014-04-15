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
        var flag = true;
        jQuery.each( $('#form-sube-tu-idea input:text'), function( i, val ) {

            if($(this).val()){
                flag = false;
                return false;
            }


        });
        jQuery.each( $('#form-sube-tu-idea textarea'), function( i, val ) {

            if($(this).val()){
                flag = false;
                return false;
            }


        });

        console.log(flag)
        if(flag){
            var $popup = $('.popUp-container');
            $popup.addClass('show');

            var template = '';
            template +=
                '<div id="contend-error">' +
                    '<h2>Error</h2><ul style="color: #ffffff">';

            template += '<li id="Errorli"></li>';

            template += '</ul></div>' ;
            $('#popUp-contend').append(template);
            $('.close').on('click', $('body'), function () {
                $popup.removeClass('show');

                $('#contend-error').remove();
            });
            $('#Errorli').text('Debes diligenciar todos los campos.');
            return true;
        }

        if (r.success == 1) {

            var $popup = $('.popUp-container');
            $popup.addClass('show');

            var template = '';
            template +=
                '<div id="contend-error">' +
                    '<h2>Tu idea se ha enviado exitosamente! Dentro de poco la podrás ver y ' +
                    'decirle a tus amigos que voten por ella! Estaremos en contacto ;)</h2><ul style="color: #ffffff">';


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