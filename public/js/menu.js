$(function () {

    $('.check').on('click',function(){

        if($(this).is(':checked') == true ){

            data = {'activo' : 1, 'id' : $(this).data('id')};
        }else{
            data = {'activo' : 0, 'id' : $(this).data('id')};
        }
        console.log(data)
        $.post( $('#updateMenu').attr('href'), data, function( data ) {
            console.log( 'ok' );
        }, "json");
    });

});
