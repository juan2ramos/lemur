$(function(){
    $('#form-comentario').on('submit',function(e){
        e.preventDefault();
        var fields = $(':input').serializeArray();
        $('#facebookG').addClass('show');
        $.post($(this).attr('action'), fields, responseFormComment, 'json')
    })

});

function responseFormComment(data){

    var $popup = $('.popUp-container');
    $popup.addClass('show');

    var template = '';
    if(data.success == 1){
        $('#form-comentario').css('display','none');

        template +=
            '<div id="contend-error">' +
                '<h2>Comentario enviado Exitosamente</h2><ul style="color: #ffffff">';
    }else if (data.success == 2) {
        popUps($('#img-ingresar'));
    }else{
        template +=
            '<div id="contend-error">' +
                '<h2>Error</h2><ul style="color: #ffffff">';

        for (var key in data) {
            template += '<li>Campo: ' + key + ' Tipo de error: ' + data[key] +
                '</li>'
        }

    }

    $('#facebookG').removeClass('show');

    template += '</ul></div>' ;
    $('#popUp-contend').append(template);
    $('.close').on('click', $('body'), function () {
        $popup.removeClass('show');
        template = "wew";
        $('#contend-error').remove();
    });
}