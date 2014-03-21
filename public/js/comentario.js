$(function(){
    $('#form-comentario').on('submit',function(e){
        e.preventDefault();
        var fields = $(':input').serializeArray();
        $.post($(this).attr('action'), fields, responseFormComment, 'json')
    })

});

function responseFormComment(data){
    alert(data.message);
}