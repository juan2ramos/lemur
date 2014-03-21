
    function getTime() {

        now = new Date();
        y2k = new Date($('#date').val());
        days = (y2k - now) / 1000 / 60 / 60 / 24;
        daysRound = Math.floor(days);
        hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
        hoursRound = Math.floor(hours);
        minutes = (y2k - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
        minutesRound = Math.floor(minutes);
        seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
        secondsRound = Math.round(seconds);

        $('#dayNumber').html(zero(daysRound)+'<span>:</span>');
        $('#hourNumber').html(zero(hoursRound)+'<span>:</span>');
        $('#minNumber').html(zero(minutesRound)+'<span>:</span>');
        $('#secNumber').html(zero(secondsRound));

        newtime = window.setTimeout("getTime();", 1000);
    }
    function zero(data){
        if (data < 10)
            return '0'+data;
        return data;
    }
    window.setTimeout("getTime();", 1000)

