(function ($) {
    Drupal.behaviors.colorize = {
        attach: function (context, settings) {
            $("#getting-started")
                .countdown("2018/01/01", function (event) {
                    $(this).text(
                        event.strftime('%D days %H:%M:%S')
                    );
                });
            // $(".custom-block-content", context).once("colorize").each(function () {
            //     window.timestamp = settings.custom_block.colorCountdown.remain;
            //     var timeinterval = setInterval(updateClock, 1000);
            // });
        }
    }
    var updateClock = function () {
        var days = Math.floor(window.timestamp / (60 * 60 * 24));
        var daysTimestamp = days * 60 * 60 * 24;
        var hoursTimestamp = window.timestamp - daysTimestamp;
        var hours = Math.floor(hoursTimestamp / 3600);
        var hourfulltime = hours * 3600;
        var minutesTimestamp = hoursTimestamp - hourfulltime;
        var minutes = Math.floor((minutesTimestamp % 3600) / 60);
        var seconds = (minutesTimestamp - minutes) % 60;

        $(".custom-block-content").html(
            days + "-days, " + hours + "-hours, " + minutes + "-minutes, " + seconds + "-seconds"
        );

        window.timestamp--;
    }
}(jQuery));


