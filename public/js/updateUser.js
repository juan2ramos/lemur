$(function(){

    ratio = 1;
    var bg = $('#imagen-perfil');
    screenWidth =  $(bg).width();
    screenHeight =  $(bg).height();

    if (screenWidth/screenHeight > ratio) {
        $(bg).height("100%");
        $(bg).width("auto");
        left = screenWidth*65/screenHeight - 65;
        $(bg).css({
            'position':'absolute',
            'left': -left
        });
    } else {
        $(bg).width("100% ");
        $(bg).height("auto");
    }

    $('#imagenUser').on('change',function(){
        for (var i = 0; i < this.files.length; i++) {
            if ((/^image\/(gif|png|jpeg)$/i).test(this.files[i].type)) {
                if(this.files[i].size < 2400000){
                    uploadImage(this.files[i]);

                        $('#url-archivo').val(this.files[i].name);

                }else{
                    alert("El tamaño de la imagen debe ser inferior a 2MB");
                }

            } else {
                alert("tipo de archivo no soportado");
            }
        }
    });

    $('#user-update').on('submit',function(e){
        e.preventDefault();
        var fields = $(this).serializeArray();

        $.post($(this).attr('action'), fields, responseFormUser, 'json')
    })

});

function responseFormUser(data){
    if(data.success == 1){
        var $popup = $('.popUp-container');
        $popup.addClass('show');

        var template = '';
        template +=
            '<div id="contend-error"><h2>Tus datos han sido guardados exitosamente! </h2></div>'

        $('#popUp-contend').append(template);
        $('.close').on('click', $('body'), function () {
            location.reload();
        });
    }else{
        var $popup = $('.popUp-container');
        $popup.addClass('show');
        var template = '';
        template +=
            '<div id="contend-error">' +
                '<h2>Error</h2><ul style="color: #ffffff">';

        for (var r in data) {

            template += '<li>Campo: ' + r + ' Tipo de error: ' + data[r] +
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