
    function getTime() {
        date = $('#date').val().split("-");
        daysF = date[2].split(" ");
        now = new Date();
        y2k = new Date(parseInt(date[0]),parseInt(date[1])-1,parseInt(daysF[0]),23,59,59);
        days = (y2k - now) / 1000 / 60 / 60 / 24;

        daysRound = Math.floor(days);
        hours = (y2k - now) / 1000 / 60 / 60 - (24 * daysRound);
        hoursRound = Math.floor(hours);
        minutes = (y2k - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
        minutesRound = Math.floor(minutes);
        seconds = (y2k - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
        secondsRound = Math.round(seconds);

        $('#dayNumber').html((zero(daysRound))+'<span>:</span>');
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
    function parse(str) {
        if(!/^(\d){8}$/.test(str)) return "invalid date";
        var y = str.substr(0,4),
            m = str.substr(4,2),
            d = str.substr(6,2);
        return new Date(y,m,d);
    }
    window.setTimeout("getTime();", 1000)

