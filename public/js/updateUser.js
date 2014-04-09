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
            '<div id="contend-error">' +
                '<h2>Sus datos han sido guardados con éxito!!!</h2><ul style="color: #ffffff">'+
        '<li>Guardado exitomasamente</li></ul>';
        $('#popUp-contend').append(template);
        $('.close').on('click', $('body'), function () {
            location.reload();
        });
    }else{
        console.log(data);
    }
}