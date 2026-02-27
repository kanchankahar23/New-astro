jQuery(document).ready(function($) {
    "use strict";
    var calendar = $('#appointment_date').fullCalendar({
        events: JSON.parse(Astro_appointment_datas.appointment_datas),
    });
    /**
     * Appointment Form
     */
    $(document).on("click", ".fc-event-title", function() {
        var schedule_id = $(this).find('span').attr('data-schedule_id');
        var schedule_date = $(this).find('span').attr('data-schedule_date');
        $('#appointment_booking_date').val(schedule_date);
        var formdata = 'schedule_id=' + schedule_id + '&schedule_date=' + schedule_date;
        formdata += '&action=Astro_appointment_schedule_show';
        $(".hl-preloader").show();
        $.ajax({
            type: 'post',
            url: Astro_appointment_datas.url,
            data: formdata,
            success: function(response) {
                $(".hl-preloader").hide();
                $('#Astro_appointment_schedule').html(response);
                $("#hl-appointment-modal").modal("show");

            }
        });
    });
});