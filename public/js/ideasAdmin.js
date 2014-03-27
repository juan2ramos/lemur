
$(function () {
    $( "#categorias" ).change(function() {
        window.location.href = $('#urlIdea').attr('href')+ '/' +$(this).val();
    });

    $('.check').on('click',function(){
        if($(this).is(':checked') == true ){

            data = {'estado' : 1, 'id' : $(this).data('id')};
        }else{
            data = {'estado' : 0, 'id' : $(this).data('id')};
        }
        $.post( $('#comntarioUpdate').attr('href'), data, function( data ) {
            console.log( 'ok' );
        }, "json");
    });

});

