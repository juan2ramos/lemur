(function($) {
    $.fn.limitar = function(options) {
        defaults = {
            limite: 200,
            id_counter: false,
            clase_alert: false
        }
        var options = $.extend(defaults, options);
        return this.each(function() {
            var caracteres = options.limite;
            if (options.id_counter != false) {
                $("#" + options.id_counter).html(caracteres + "caracteres restantes");
            }

            $(this).keyup(function() {
                console.log(options.id_counter);
                if ($(this).val().length > caracteres) {
                    $(this).val($(this).val().substr(0, caracteres));
                }
                if (options.id_counter != false) {
                    var quedan = caracteres - $(this).val().length;
                    $("#" + options.id_counter).html(quedan + "</strong> caracteres restantes");
                   
                }
            });
        });
    };
})(jQuery);