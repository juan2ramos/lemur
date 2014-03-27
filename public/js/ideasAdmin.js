
$(function () {
    $( "#categorias" ).change(function() {
        window.location.href = $('#urlIdea').attr('href')+ '/' +$(this).val();
    });

});